<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Models\User;
use App\Models\Bookcreate;
use App\Models\Bookcategorycreate;
use App\Models\Programcreate;
use App\Models\Yearcreate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log; // Add this at the top of your file
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\DB;



class LibraryController extends Controller
{
    public function bookmanagement()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $programs = programcreate::all()->map(function ($program) {
            return [
                'id' => $program->id,
                'name' => $program->name,
                'description' => $program->description,
                'status' => $program->status,
            ];
        });
        $categorys = Bookcategorycreate::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'catname' => $category->catname,
                'catdes' => $category->catdes,
                'status' => $category->status,
            ];
        });
        // Eager load related data with the books
        $books = Bookcreate::with(['category'])->get()->map(function ($book) {
            $programId = $book->program; // Assuming this is an ID
            $program = Programcreate::find($programId); // Fetch the program object
            $programName = $program ? $program->name : 'N/A';

            $yearId = $book->year; // Assuming this is an ID
            $year = Yearcreate::find($yearId); // Fetch the program object
            $yearName = $year ? $year->name : 'N/A';
            return [
                'id' => $book->id,
                'bookname' => $book->bookname,
                'bookauthor' => $book->bookauthor,
                'bookdes' => $book->bookdes,
                'category_name' => $book->category->catname ?? 'N/A',
                'program_name' => $programName,
                'year_name' => $yearName,
                'status' => $book->status,
            ];
        });
        return view('library.bookmanagement', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'programsData' => $programs, // Pass allowed permissions to the view
            'categorysData' => $categorys, // Pass allowed permissions to the view
            'booksData' => $books, // Pass allowed permissions to the view
        ]);
    }

    public function addcategory()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $categorys = Bookcategorycreate::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'catname' => $category->catname,
                'catdes' => $category->catdes,
                'status' => $category->status,
            ];
        });
        return view('library.addcategory', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'categorysData' => $categorys, // Pass allowed permissions to the view
        ]);
    }

    public function bookscreate(Request $request)
    {
        $request->validate([
            'bookname' => 'required',
            'bookauthor' => 'required',
            'bookdes' => 'required',
            'bookcat' => 'required',
            'program' => 'required',
            'selectyear' => 'required',
            'maxallowed' => 'required',
            'status' => 'required',

        ]);

        try {
            // Initialize filename to null
            $filename = null;

            // Handle the file upload
            if ($request->hasFile('bookcover')) {
                $file = $request->file('bookcover');


                $pdfFile = $request->file('pdf');
                $bookName = str_replace(' ', '_', strtolower($request->input('bookname'))); // Convert book name to a file-safe format

                // Create the book folder in public/books/{bookname}
                $bookFolder = public_path('books/' . $bookName);

                // Create the file name using the book name with a .jpg extension
                $filename = str_replace(' ', '_', strtolower($bookName)) . '.jpg';

                // Check if the folder exists, if not create it
                if (!file_exists($bookFolder)) {
                    if (!mkdir($bookFolder, 0777, true) && !is_dir($bookFolder)) {
                        throw new \RuntimeException(sprintf('Directory "%s" was not created', $bookFolder));
                    }
                }
                // Move the file to the specific folder inside public/books
                $file->move($bookFolder, $filename);
                // Create a new instance of FPDI

                // Move the PDF to the created folder with the new name
                $pdfFilePath = $bookFolder . '/' . $bookName . '.pdf';
                $pdfFile->move($bookFolder, $bookName . '.pdf');


                // Extract pages and save them as individual PDFs
                // $pageCount = (new Fpdi())->setSourceFile($pdfFilePath); // Get total pages of the PDF
                $pageCount = 0;

                // for ($i = 1; $i <= $pageCount; $i++) {
                //     // Create a new instance of Fpdi for the current page
                //     $newPdf = new Fpdi();

                //     // Set the source file for each page
                //     $newPdf->setSourceFile($pdfFilePath);

                //     // Add a new page to the PDF
                //     $newPdf->AddPage();

                //     // Import the current page
                //     $pageId = $newPdf->importPage($i);
                //     $newPdf->useTemplate($pageId, 0, 0, 210); // Render the template

                //     // Save each page as a separate PDF in the book folder
                //     $outputFile = "{$bookFolder}/{$bookName}{$i}.pdf";
                //     $newPdf->Output('F', $outputFile); // Save each page as a separate PDF
                // }

            }

            // Create the book entry with only the file name saved in the database
            $bookcreate = Bookcreate::create([
                'bookname' => $request->input('bookname'),
                'bookauthor' => $request->input('bookauthor'),
                'bookdes' => $request->input('bookdes'),
                'bookcat' => $request->input('bookcat'),
                'program' => $request->input('program'),
                'year' => $request->input('selectyear'),
                'total_pages' => $pageCount,
                'maxallowed' => $request->input('maxallowed'),
                'status' => $request->input('status'),
                'cover_image' => $filename, // Save the filename only
            ]);

            return redirect()->route('bookmanagement')->with('success', 'Book Successfully Uploaded');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error uploading book: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while uploading the book.');
        }
    }

    public function categorycreate(Request $request)
    {
        $request->validate([
            'catname' => 'required',
            'catdes' => 'required',
            'status' => 'required',
        ]);

        try {
            // Create the book entry with only the file name saved in the database
            $categorycreate = Bookcategorycreate::create([
                'catname' => $request->input('catname'),
                'catdes' => $request->input('catdes'),
                'status' => $request->input('status'),
            ]);
            return redirect()->route('addcategory')->with('success', 'Category Successfully Uploaded');
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Error uploading book: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while uploading the book.');
        }
    }

    public function bookshow()
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions
        $books = Bookcreate::all()->map(function ($book) {
            return [
                'id' => $book->id,
                'bookname' => $book->bookname,
                'bookauthor' => $book->bookauthor,
                'bookdes' => $book->bookdes,
                'bookcat' => $book->bookcat,
                'program' => $book->program,
                'year' => $book->year,
                'total_pages' => $book->total_pages,
                'maxallowed' => $book->maxallowed,
                'status' => $book->status,
                'cover_image' => $book->cover_image,
            ];
        });
        $categorys = Bookcategorycreate::all()->map(function ($category) {
            return [
                'id' => $category->id,
                'catname' => $category->catname,
                'catdes' => $category->catdes,
            ];
        });
        return view('library.bookshow', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'booksdata' => $books,
            'categorysdata' => $categorys,

        ]);
    }

    // public function readBook($id)
    // {
    //     $user = Auth::user(); // Get the authenticated user
    //     $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

    //     // Fetch the book data by ID
    //     $book = Bookcreate::findOrFail($id);

    //     // Get the book's name in the required format
    //     $bookName = str_replace(' ', '_', strtolower($book->bookname));

    //     // Fetch all individual page PDFs
    //     $bookFolder = public_path('books/' . $bookName);
    //     $pages = [];

    //     if (file_exists($bookFolder)) {
    //         // Scan the directory for PDF files
    //         foreach (scandir($bookFolder) as $file) {
    //             if (preg_match("/\.pdf$/", $file) && preg_match("/{$bookName}\d+\.pdf$/", $file)) {
    //                 $pages[] = asset('public/books/' . $bookName . '/' . $file);
    //             }
    //         }

    //         // Use natural sorting for the pages array to get numerically ordered filenames
    //         natsort($pages);
    //     }

    //     // Return the view with book details and pages
    //     return view('library.bookread', [
    //         'user' => $user,
    //         'userStatus' => $user->status, // Pass user status to the view
    //         'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
    //         'book' => $book,
    //         'pages' => $pages
    //     ]);
    // }








    public function readBook($id)
    {
        $user = Auth::user(); // Get the authenticated user
        $allowedPermissions = $user->permissions()->pluck('name')->toArray(); // Fetch the user's permissions

        $book = Bookcreate::find($id);

        if (!$book) {
            // Book nahi mila
            return abort(404);
        }

        $bookData = [
            'id' => $book->id,
            'bookname' => $book->bookname,
            'bookauthor' => $book->bookauthor,
            'bookdes' => $book->bookdes,
            'bookcat' => $book->bookcat,
            'program' => $book->program,
            'year' => $book->year,
            'total_pages' => $book->total_pages,
            'maxallowed' => $book->maxallowed,
            'status' => $book->status,
            'cover_image' => $book->cover_image,
        ];

        // Fetch all individual page PDFs
        $bookFolder = public_path('books/' . str_replace(' ', '_', strtolower($book->bookname)));
        //$pages = [];

        // if (file_exists($bookFolder)) {
        //     // Scan the directory for PDF files
        //     foreach (scandir($bookFolder) as $file) {
        //         if (preg_match("/\.pdf$/", $file) && preg_match("/" . str_replace(' ', '_', strtolower($book->bookname)) . "\d+\.pdf$/", $file)) {
        //             $pages[] = asset('public/books/' . str_replace(' ', '_', strtolower($book->bookname)) . '/' . $file);
        //         }
        //     }

        //     // Use natural sorting for the pages array to get numerically ordered filenames
        //     natsort($pages);
        // }

        // Return the view with book details and pages
        return view('library.bookread', [
            'user' => $user,
            'userStatus' => $user->status, // Pass user status to the view
            'allowedPermissions' => $allowedPermissions, // Pass allowed permissions to the view
            'book' => $bookData,
            //'pages' => $pages
        ]);
    }


}
