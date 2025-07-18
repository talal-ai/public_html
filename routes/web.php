<?php
use App\Livewire\Users;
use App\Livewire\Chat\Chat;
use App\Livewire\Chat\Index;
use App\Livewire\Chat\Chatbox;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentlmsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IonController;
use App\Http\Controllers\MentorshipController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\LmsController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminusersController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\FaultyusersController;
use App\Http\Controllers\SocialAppsController;
use App\Http\Controllers\ComponentsController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\BroadcastAuthController;



Route::get('/users', Users::class)->name('users')->middleware('auth');
Route::get('/messenger', Index::class)->name('messenger.index');
Route::get('/userchat/{query}', chat::class)->name('userchat');

Route::get('/messenger/{userId}', [Users::class, 'messenger'])->name('messenger');

// Route::get('/', [HomeController::class, 'analysis'])->name('index');
Route::get('/', [AuthenticationController::class, 'login'])->name('index');
Route::get('/admin_dashboard', [DashboardController::class, 'welcomeadmin'])->middleware('auth')->name('admin_dashboard');
Route::get('/student_dashboard', [DashboardController::class, 'welcomestudent'])->middleware('auth')->name('student_dashboard');
Route::get('/course_survey_stats', [DashboardController::class, 'course_survey_stats'])->name('course_survey_stats');
Route::get('/teacher_dashboard', [DashboardController::class, 'welcometeacher'])->middleware('auth')->name('teacher_dashboard');
Route::get('/adminuser_dashboard', [DashboardController::class, 'welcomeadminuser'])->middleware('auth')->name('adminuser_dashboard');
Route::get('/faultyuser_dashboard', [DashboardController::class, 'welcomefaulty'])->middleware('auth')->name('faultyuser_dashboard');
Route::get('/exportSurveyStats_faulty', [DashboardController::class, 'exportSurveyStats_faulty'])->name('exportSurveyStats_faulty');
Route::get('/exportSurveyStats_course', [DashboardController::class, 'exportSurveyStats_course'])->name('exportSurveyStats_course');
Route::get('/exportSurveyStatsCourseToPDF', [DashboardController::class, 'exportSurveyStatsCourseToPDF'])->name('exportSurveyStatsCourseToPDF');
Route::get('/exportSurveyStatsFaultyToPDF', [DashboardController::class, 'exportSurveyStatsFaultyToPDF'])->name('exportSurveyStatsFaultyToPDF');
Route::get('/get-question-stats/{id}/{surveyName}', [DashboardController::class, 'getQuestionStats']);


Route::get('/changelog', [HomeController::class, 'changelog'])->name('changeLog');
Route::get('/chart', [HomeController::class, 'chart'])->middleware('auth')->name('chart');
Route::get('/contact', [HomeController::class, 'contacts'])->name('contact');
Route::get('/dragdrop', [HomeController::class, 'dragdrop'])->name('dragdrop');
Route::get('/fonticons', [HomeController::class, 'fonticons'])->name('fonticons');
// Route::get('/feedback', [FeedbackController::class, 'feedback'])->name('feedback');
Route::get('/orderlist', [HomeController::class, 'orderlist'])->name('orderList');
Route::get('/payments', [HomeController::class, 'payments'])->name('payments');
Route::get('/profilesetting', [HomeController::class, 'profilesetting'])->middleware('auth')->name('profileSetting');


// Route::get('/notifications/send', [NotificationController::class, 'sendNotification']);
// Route::get('/notifications', [NotificationController::class, 'fetchUserNotifications']);
// Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead']);
Route::get('/custom-broadcasting/auth', [BroadcastAuthController::class, 'authenticate']);

Route::prefix('dashboard/')->middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('analysis', 'analysis')->name('analysis');
        Route::get('ecommerce', 'ecommerce')->name('ecommerce');
        Route::get('accounts', 'accounts')->name('accounts');
    });
});


Route::get('/ion', [IonController::class, 'ion'])->name('ion');
Route::get('/getnoticfication/{noticeId}', [IonController::class, 'getnoticfication'])->name('getnoticfication');
Route::post('/submitnotification', [IonController::class, 'submitnotification'])->name('submitnotification');

Route::prefix('Studentsetting/')->middleware('auth')->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('studentmanagement', 'studentmanagement')->name('studentmanagement');
        Route::post('createstudent', 'createstudent')->name('createstudent');
        Route::post('csvupload', 'upload')->name('csvupload');
        Route::get('downloadstudentSampleCSV', 'downloadstudentSampleCSV')->name('downloadstudentSampleCSV');
        Route::get('/get-years/{programId}', 'getYears')->name('getYears');
        Route::get('/get-assigned-years/{teacherId}', 'getassignedYears')->name('getassignedYears');
        Route::get('/getBatch/{yearId}', 'getBatch')->name('getBatch');
        Route::get('/getstudent/{yearId}/{selectedProgramValue}', 'getstudent')->name('getstudent');
        Route::get('/getsubject/{yearId}', 'getsubject')->name('getsubject');
        Route::get('/getTeacher/{programId}', 'getTeacher')->name('getTeacher');
        Route::get('/getdevice/{venueId}', 'getdevice')->name('getdevice');
    });
});


Route::prefix('Attendance/')->middleware('auth')->group(function () {
    Route::controller(AttendanceController::class)->group(function () {
        Route::post('machineattendance', 'machineattendance')->name('machineattendance');
        Route::post('saveattendance', 'saveattendance')->name('saveattendance');
        Route::get('getPunchRecords', 'getPunchRecords')->name('getPunchRecords');
    });
});

Route::prefix('librarysetting/')->middleware('auth')->group(function () {
    Route::controller(LibraryController::class)->group(function () {
        Route::get('bookmanagement', 'bookmanagement')->name('bookmanagement');
        Route::get('addcategory', 'addcategory')->name('addcategory');
        Route::get('bookshow', 'bookshow')->name('bookshow');
        Route::post('bookscreate', 'bookscreate')->name('bookscreate');
        Route::post('categorycreate', 'categorycreate')->name('categorycreate');
        Route::get('/bookread/{id}', 'readBook')->name('bookread');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('rolessetting', 'rolessetting')->name('rolessetting')->middleware('permission:can_view,Can View Role Management');
        Route::post('createrole', 'createrole')->name('createrole');
        Route::get('createaccount', 'createaccount')->name('createaccount');
        Route::get('usermanagement', 'usermanagement')->name('usermanagement')->middleware('permission:can_view,Can View User Management');
        Route::get('teachermanagement', 'teachermanagement')->name('teachermanagement')->middleware('permission:can_view,Can View Teacher Management');
        Route::get('createsession', 'createsession')->name('createsession')->middleware('permission:can_view,Can View Session');
        Route::get('createprogram', 'createprogram')->name('createprogram')->middleware('permission:can_view,Can View Program');
        Route::get('createyear', 'createyear')->name('createyear')->middleware('permission:can_view,Can View Year');
        Route::get('createbatch', 'createbatch')->name('createbatch')->middleware('permission:can_view,Can View Batch');
        Route::get('createvenue', 'createvenue')->name('createvenue')->middleware('permission:can_view,Can View Venue Management');
        Route::get('subjectmanagement', 'subjectmanagement')->name('subjectmanagement')->middleware('permission:can_view,Can View Subject Management');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(TeacherController::class)->group(function () {
        Route::post('createteacher', 'createteacher')->name('createteacher');
        Route::post('updateteacher', 'updateteacher')->name('updateteacher');
        Route::get('/get-teacher-data/{teacherId}', 'getteacherdata')->name('getteacherdata');
    });
});


Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('/get-role-data/{roleId}', 'getroledata')->name('getroledata');
        Route::post('updaterole', 'updaterole')->name('updaterole');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(VenueController::class)->group(function () {
        Route::post('venuecreate', 'venuecreate')->name('venuecreate');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(SubjectController::class)->group(function () {
        Route::post('createsubject', 'createsubject')->name('createsubject');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(BatchesController::class)->group(function () {
        Route::post('batchcreate', 'batchcreate')->name('batchcreate');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(AdminusersController::class)->group(function () {
        Route::post('createadminusers', 'createadminusers')->name('createadminusers');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(FaultyusersController::class)->group(function () {
        Route::post('createfaultyusers', 'createfaultyusers')->name('createfaultyusers');
    });
});

Route::prefix('feedback/')->middleware('auth')->group(function () {
    Route::controller(FeedbackController::class)->group(function () {
        // Route::get('courseevaluation', 'courseevaluation')->name('courseevaluation');
        // Route::get('facultysurvey', 'facultysurvey')->name('facultysurvey');
        Route::post('feedback/storeSurveyResponses', 'storeSurveyResponses')->name('storeSurveyResponses');
        Route::get('{surveyType}', 'showSurvey')->name('showSurvey');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(SessionController::class)->group(function () {
        Route::post('sessioncreate', 'sessioncreate')->name('sessioncreate');
        Route::post('sessionupdate', 'sessionupdate')->name('sessionupdate');
        Route::get('/get-session-data/{sessionId}', 'getsessiondata')->name('getsessiondata');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(ProgramController::class)->group(function () {
        Route::post('programcreate', 'programcreate')->name('programcreate');
    });
});

Route::prefix('gernelsetting/')->middleware('auth')->group(function () {
    Route::controller(YearController::class)->group(function () {
        Route::post('yearcreate', 'yearcreate')->name('yearcreate');
    });
});

Route::prefix('lms/')->middleware('auth')->group(function () {
    Route::controller(LmsController::class)->group(function () {
        Route::get('chat', 'chat')->name('chat');
        Route::get('videolecture', 'videolecture')->name('videolecture');
        Route::post('videocreate', 'videocreate')->name('videocreate');
        Route::get('/viewvideo/{video_id}', 'viewvideo')->name('viewvideo');
        Route::get('assignment', 'assignment')->name('assignment');
        Route::get('viewassignment/{assignmentId}', 'viewassignment')->name('viewassignment');
        Route::post('assignmentcreate', 'assignmentcreate')->name('assignmentcreate');
        Route::post('updateassignmentby', 'updateassignmentby')->name('updateassignmentby');
        Route::get('downloadassignment/{program}/{year}/{subject}/{year1}/{month}/{filename}', 'downloadassignment')->name('downloadassignment');
        Route::get('quiz', 'quiz')->name('quiz');
        Route::get('viewquiz/{quiztId}', 'viewquiz')->name('viewquiz');
        Route::get('resultquiz', 'resultquiz')->name('resultquiz');
    });
});

Route::prefix('mentorship')->middleware('auth')->group(function () {
   Route::controller(MentorshipController::class)->group(function () {
        Route::get('sendrequestbyadmin', 'sendrequestbyadmin')->name('sendrequestbyadmin');
        Route::get('sendrequestbyteacher', 'sendrequestbyteacher')->name('sendrequestbyteacher');
        Route::get('receivedrequestfromteacher', 'receivedrequestfromteacher')->name('receivedrequestfromteacher');
        Route::get('listofacceptance', 'listofacceptance')->name('listofacceptance');
        Route::get('createteacherlist', 'createteacherlist')->name('createteacherlist');
        Route::post('save-teacher-list', 'saveTeacherList')->name('save-teacher-list');
        Route::get('listofacceptancebystudent', 'listofacceptancebystudent')->name('listofacceptancebystudent');
        Route::get('/get-programs/{userId}', 'getprograms')->name('getprograms');
        Route::get('/get-years/{program_id}', 'getyears')->name('getyears');
        Route::get('/mentorshipagreement', 'mentorshipagreement')->name('mentorshipagreement');
        Route::post('store', 'store')->name('mentorship.store');
        Route::get('/send-request/{userId}', 'showSendRequestForm')->name('show.send.request');
        Route::post('/send-request', 'storeSendRequest')->name('store.send.request');
        Route::get('/view-request/{requestId}', 'viewRequest')->name('view.request');
        Route::post('/mentorship/update-request-status/{id}', 'updateRequestStatus')->name('update.request.status');
        Route::get('/teacher/assignable-students/{teacher_id}', 'showAssignableStudents')->name('teacher.assignable.students');
        Route::post('/teacher/{teacher_id}/save-assignments', 'saveAssignments')->name('teacher.save.assignments');
        Route::get('get-teachers-list', 'getTeachersList')->name('get.teachers.list');
        Route::post('send-teacher-request', 'sendTeacherRequest')->name('send.teacher.request');
    });

    Route::controller(NotificationController::class)->group(function () {
        Route::get('notifications', 'fetchUserNotifications');
        Route::post('notifications/{id}/read', 'markAsRead');
        Route::get('notifications/send/{yearId}', 'sendNotification');
        Route::get('notification/{id}/view', 'viewNotification')->name('notification.view');
    });
});

Route::prefix('quiz/')->middleware('auth')->group(function () {
    Route::controller(QuizController::class)->group(function () {
        Route::get('addnewquestion', 'addnewquestion')->name('addnewquestion');
        Route::get('addnewquestiongroup', 'addnewquestiongroup')->name('addnewquestiongroup');
        Route::post('createquestiongroup', 'createquestiongroup')->name('createquestiongroup');
        Route::post('createquestion', 'createquestion')->name('createquestion');
        Route::post('quizcreate', 'quizcreate')->name('quizcreate');
        Route::post('submitquiz', 'submitquiz')->name('submitquiz');
        Route::post('submitquestion', 'submitquestion')->name('submitquestion');
        Route::post('submitquiztimeexpire', 'submitquiztimeexpire')->name('submitquiztimeexpire');
        Route::get('gettotalquestionofgroup/{groupId}', 'gettotalquestionofgroup')->name('gettotalquestionofgroup');

    });
});

Route::prefix('attendancesetting/')->middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('createdevice', 'createdevice')->name('createdevice')->middleware('permission:can_view,Can View Manage Devices');
    });
});

Route::prefix('attendancesetting/')->middleware('auth')->group(function () {
    Route::controller(DeviceController::class)->group(function () {
        Route::post('devicecreate', 'devicecreate')->name('devicecreate');
        Route::get('createattendance', 'createattendance')->name('createattendance');
    });
});

Route::prefix('socialapps/')->middleware('auth')->group(function () {
    Route::controller(SocialAppsController::class)->group(function () {
        Route::get('compose', 'compose')->name('compose');
        Route::get('inbox', 'inbox')->name('inbox');
        // Route::get('chat', 'chat')->name('chat');
    });
});

Route::prefix('components/')->group(function () {
    Route::controller(ComponentsController::class)->group(function () {
        Route::get('accordions', 'accordions')->name('accordions');
        Route::get('tabs', 'tabs')->name('tabs');
        Route::get('modal', 'modal')->name('modal');
        Route::get('notification', 'notification')->name('notification');
        Route::get('lightbox', 'lightbox')->name('lightbox');
        Route::get('swiper', 'swiper')->name('swiper');
    });
});

Route::prefix('students/')->group(function () {
    Route::controller(StudentController::class)->group(function () {
        Route::get('application', 'application')->name('application');
        Route::get('accountbook', 'accountbook')->name('accountbook');
        Route::post('submitapplication', 'submitapplication')->name('submitapplication');
        Route::post('checkEmail', 'checkEmail')->name('checkEmail');

    });
});

Route::prefix('students/')->group(function () {
    Route::controller(StudentlmsController::class)->group(function () {
        Route::get('studnetchat', 'studnetchat')->name('studnetchat');
        Route::get('studentassignment', 'studentassignment')->name('studentassignment');
        Route::get('studentquiz', 'studentquiz')->name('studentquiz');
        Route::get('studentviewassignment/{assignmentId}', 'studentviewassignment')->name('studentviewassignment');
        Route::get('studentuploadassignment/{assignmentId}', 'studentuploadassignment')->name('studentuploadassignment');
        Route::post('uploadassignmentbystudent', 'uploadassignmentbystudent')->name('uploadassignmentbystudent');
    });
});


Route::prefix('element/')->group(function () {
    Route::controller(ElementController::class)->group(function () {
        Route::get('alert', 'alert')->name('alert');
        Route::get('avatar', 'avatar')->name('avatar');
        Route::get('buttons', 'buttons')->name('buttons');
        Route::get('badges', 'badges')->name('badges');
        Route::get('breadcrumb', 'breadcrumb')->name('breadcrumb');
        Route::get('dropdowns', 'dropdown')->name('dropdowns');
        Route::get('loader', 'loader')->name('loader');
        Route::get('pagination', 'pagination')->name('pagination');
        Route::get('progressbar', 'progressbar')->name('progressbar');
    });
});

Route::prefix('tables/')->group(function () {
    Route::controller(TablesController::class)->group(function () {
        Route::get('basictable', 'basicTable')->name('basicTable');
        Route::get('datatable', 'dataTable')->name('dataTable');
        Route::get('eidtabletable', 'eidtableTable')->name('eidtableTable');
    });
});

Route::prefix('forms/')->group(function () {
    Route::controller(FormsController::class)->group(function () {
        Route::get('basic', 'basic')->name('basic');
        Route::get('inputgroup', 'inputGroup')->name('inputGroup');
        Route::get('validation', 'validation')->name('validation');
        Route::get('checkbox', 'checkbox')->name('checkbox');
        Route::get('radio', 'radio')->name('radio');
        Route::get('switches', 'switches')->name('switches');
    });
});

Route::prefix('invoice/')->group(function () {
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('invoice', 'invoice')->name('invoice');
        Route::get('invoiceadd', 'invoiceAdd')->name('invoiceAdd');
        Route::get('invoicelist', 'invoiceList')->name('invoiceList');
    });
});

Route::prefix('pages/')->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('starterpage', 'starterPage')->name('starterPage');
        Route::get('pricing', 'pricing')->name('pricing');
        Route::get('comingsoon', 'comingsoon')->name('comingsoon');
        Route::get('maintenance', 'maintenance')->name('maintenance');
        Route::get('error404', 'error404')->name('error404');
        Route::get('error500', 'error500')->name('error500');
        Route::get('error503', 'error503')->name('error503');
    });
});

Route::prefix('authentication/')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('process-login', 'processLogin')->name('processLogin');
        Route::post('processLoginadmission', 'processLoginadmission')->name('processLoginadmission');
        Route::post('processLoginadmissionwithtransactionid', 'processLoginadmissionwithtransactionid')->name('processLoginadmissionwithtransactionid');
        Route::post('register-user', 'registerUser')->name('registerUser');
        Route::get('logincover', 'loginCover')->name('loginCover');
        Route::get('signin', 'signin')->name('signin');
        Route::get('admissionform', 'admissionform')->name('admissionform');
        Route::get('admissionform1', 'admissionform1')->name('admissionform1');
        Route::get('loginadmissionform', 'loginadmissionform')->name('loginadmissionform');
        Route::get('loginadmissionformtransactionid', 'loginadmissionformtransactionid')->name('loginadmissionformtransactionid');
        Route::get('admissiondashboard', 'admissiondashboard')->name('admissiondashboard');
        Route::get('signincover', 'signinCover')->name('signinCover');
        Route::get('resetpassword', 'resetPassword')->name('resetPassword');
        Route::get('resetpasswordcover', 'resetPasswordCover')->name('resetPasswordCover');
        Route::get('verification', 'verification')->name('verification');
        Route::get('verificationcover', 'verificationCover')->name('verificationCover');
        Route::post('logout', 'logout')->name('logout'); // Add this line for logout
    });
});