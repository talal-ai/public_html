@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4 flex-1" x-data="email">
        <div class="flex gap-5 items-stretch relative overflow-hidden" x-data="{activeTab:'inbox'}">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-l-lg xl:rounded-lg p-5 absolute w-[200px] z-20 flex-none -left-[410px] xl:static overflow-hidden overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]" :class="isShowChatMenu && '!left-0'">
                <div class="flex flex-col space-y-5">
                    <button @click="activeTab = 'compose'" :class="activeTab === 'compose' ? '' : ''" class="bg-primary text-white px-5 py-2.5 flex items-center gap-2.5 rounded-lg">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M2.70837 18.3334C2.70837 17.9882 2.9882 17.7084 3.33337 17.7084H16.6667C17.0119 17.7084 17.2917 17.9882 17.2917 18.3334C17.2917 18.6786 17.0119 18.9584 16.6667 18.9584H3.33337C2.9882 18.9584 2.70837 18.6786 2.70837 18.3334Z" fill="currentColor" />
                            <path opacity="0.5" d="M15.9005 6.14298C16.9246 5.11895 16.9246 3.45867 15.9005 2.43465C14.8765 1.41062 13.2162 1.41062 12.1922 2.43465L11.6007 3.02614C11.6088 3.05059 11.6172 3.07539 11.6259 3.10051C11.8427 3.72541 12.2518 4.5446 13.0213 5.31411C13.7908 6.08362 14.61 6.49268 15.2349 6.70948C15.2599 6.71815 15.2846 6.72652 15.3089 6.73458L15.9005 6.14298Z" fill="currentColor" />
                            <path d="M11.6259 2.99963L11.6004 3.0251C11.6085 3.04956 11.6169 3.07436 11.6256 3.09948C11.8424 3.72437 12.2515 4.54356 13.021 5.31307C13.7905 6.08258 14.6097 6.49164 15.2346 6.70844C15.2594 6.71704 15.2839 6.72534 15.308 6.73334L9.59978 12.4416C9.21494 12.8264 9.02248 13.0189 8.81031 13.1843C8.56002 13.3796 8.28922 13.5469 8.00268 13.6835C7.75977 13.7992 7.50159 13.8853 6.98525 14.0574L4.26243 14.965C4.00833 15.0497 3.72819 14.9836 3.5388 14.7942C3.34941 14.6048 3.28327 14.3247 3.36797 14.0706L4.27558 11.3477C4.44769 10.8314 4.53375 10.5732 4.64952 10.3303C4.78607 10.0438 4.95344 9.77298 5.14866 9.52269C5.31414 9.31053 5.50657 9.1181 5.89139 8.73328L11.6259 2.99963Z" fill="currentColor" />
                        </svg>
                        <span class="text-sm">Compose</span>
                    </button>
                    <button @click="activeTab = 'inbox'" :class="activeTab === 'inbox' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.59976 8.83304L6.79915 9.83253C8.32968 11.108 9.09495 11.7457 10.0001 11.7457C10.9052 11.7457 11.6705 11.108 13.201 9.83253L14.4004 8.83304C14.6953 8.58729 14.8427 8.46442 14.9214 8.29644C15.0001 8.12847 15.0001 7.93653 15.0001 7.55267V5.83329C15.0001 5.5661 15.0001 5.31708 14.9985 5.0847C14.9888 3.6088 14.9171 2.80401 14.3899 2.27682C13.7797 1.66663 12.7976 1.66663 10.8334 1.66663H9.16674C7.20255 1.66663 6.22046 1.66663 5.61027 2.27682C5.08308 2.80401 5.00983 3.6088 5.00007 5.0847C4.99854 5.31708 5.00007 5.5661 5.00007 5.83329V7.55267C5.00007 7.93653 5.00007 8.12847 5.07875 8.29644C5.15742 8.46442 5.30487 8.58729 5.59976 8.83304ZM7.70833 4.99996C7.70833 4.65478 7.98816 4.37496 8.33333 4.37496H11.6667C12.0118 4.37496 12.2917 4.65478 12.2917 4.99996C12.2917 5.34514 12.0118 5.62496 11.6667 5.62496H8.33333C7.98816 5.62496 7.70833 5.34514 7.70833 4.99996ZM8.54167 7.49996C8.54167 7.15478 8.82149 6.87496 9.16667 6.87496H10.8333C11.1785 6.87496 11.4583 7.15478 11.4583 7.49996C11.4583 7.84514 11.1785 8.12496 10.8333 8.12496H9.16667C8.82149 8.12496 8.54167 7.84514 8.54167 7.49996Z" fill="currentColor" />
                                <path opacity="0.3" d="M6.79891 9.83262L5.59952 8.83314C5.30463 8.58739 5.15718 8.46452 5.0785 8.29654C4.99983 8.12857 4.99983 7.93663 4.99983 7.55277V5.83339C4.99983 5.7423 4.99965 5.65332 4.99947 5.56639C4.99914 5.39834 4.99882 5.23795 4.99983 5.0848C3.91647 5.19137 3.18723 5.43207 2.64294 5.97637C1.66663 6.95268 1.66663 8.52472 1.66663 11.6674C1.66663 14.8101 1.66663 16.3815 2.64294 17.3578C3.61925 18.3341 5.1906 18.3341 8.33328 18.3341H11.6666C14.8093 18.3341 16.3807 18.3341 17.357 17.3578C18.3333 16.3815 18.3333 14.8101 18.3333 11.6674C18.3333 8.52472 18.3333 6.95268 17.357 5.97637C16.8124 5.43177 16.0826 5.19096 14.9983 5.08447C14.9998 5.31685 14.9998 5.5662 14.9998 5.83339V7.55277C14.9998 7.93663 14.9998 8.12857 14.9212 8.29654C14.8425 8.46452 14.695 8.58739 14.4001 8.83314L13.2007 9.83262C11.6702 11.1081 10.905 11.7458 9.99983 11.7458C9.0947 11.7458 8.32944 11.1081 6.79891 9.83262Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Inbox</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                    <button @click="activeTab = 'started'" :class="activeTab === 'started' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.4028 13.9728C14.8725 14.0996 14.3191 14.1667 13.75 14.1667C9.83797 14.1667 6.66666 10.9954 6.66666 7.08334C6.66666 6.68044 6.70029 6.28541 6.76491 5.90088C6.73475 5.92989 6.70359 5.9566 6.67078 5.98151C6.43693 6.15903 6.1457 6.22492 5.56323 6.35671L5.03294 6.4767C2.9832 6.94047 1.95834 7.17235 1.71451 7.95645C1.47068 8.74054 2.16936 9.55756 3.56674 11.1916L3.92826 11.6144C4.32534 12.0787 4.52389 12.3109 4.61321 12.5981C4.70253 12.8853 4.67251 13.1951 4.61248 13.8146L4.55782 14.3787C4.34656 16.5588 4.24092 17.6489 4.87928 18.1335C5.51764 18.6181 6.47721 18.1763 8.39637 17.2927L8.8929 17.064C9.43826 16.8129 9.71095 16.6874 9.99999 16.6874C10.289 16.6874 10.5617 16.8129 11.1071 17.064L11.6036 17.2926C13.5228 18.1763 14.4823 18.6181 15.1207 18.1335C15.7591 17.6489 15.6534 16.5588 15.4422 14.3787L15.4028 13.9728Z" fill="currentColor" />
                                <path opacity="0.3" d="M7.62763 4.50706L7.35455 4.99694C7.0546 5.53503 6.90462 5.80407 6.67078 5.98159C6.70359 5.95668 6.73476 5.92997 6.76492 5.90096C6.7003 6.28549 6.66666 6.68052 6.66666 7.08342C6.66666 10.9954 9.83797 14.1668 13.75 14.1668C14.3191 14.1668 14.8726 14.0996 15.4028 13.9729L15.3875 13.8147C15.3275 13.1952 15.2975 12.8854 15.3868 12.5982C15.4761 12.3109 15.6746 12.0788 16.0717 11.6144L16.4332 11.1917C17.8306 9.55764 18.5293 8.74062 18.2855 7.95652C18.0416 7.17243 17.0168 6.94054 14.967 6.47677L14.4368 6.35679C13.8543 6.225 13.563 6.1591 13.3292 5.98159C13.0954 5.80407 12.9454 5.53503 12.6454 4.99695L12.3724 4.50706C11.3168 2.61352 10.789 1.66675 9.99999 1.66675C9.21094 1.66675 8.68317 2.61352 7.62763 4.50706Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Started</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                    <button @click="activeTab = 'sent'" :class="activeTab === 'sent' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.7856 13.3018C11.8917 13.514 11.7994 13.772 11.5826 13.8686L3.74788 17.3625C2.50135 17.9184 1.20838 16.684 1.82582 15.5276L4.45251 10.6078C4.6568 10.2252 4.6568 9.77481 4.45251 9.39217L1.82582 4.47241C1.20838 3.31595 2.50135 2.08158 3.74788 2.63747L6.6848 3.94719C7.0372 4.10434 7.32415 4.37889 7.49671 4.724L11.7856 13.3018Z" fill="currentColor" />
                                <path opacity="0.3" d="M12.9447 12.8254C13.0444 13.0249 13.2835 13.1104 13.4871 13.0196L17.5059 11.2275C18.609 10.7355 18.609 9.26516 17.5059 8.77322L10.0911 5.4666C9.73387 5.30728 9.37381 5.68361 9.54874 6.03348L12.9447 12.8254Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Sent</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                    <button @click="activeTab = 'drafts'" :class="activeTab === 'drafts' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M17.0833 8.49175H14.675C12.7 8.49175 11.0917 6.88341 11.0917 4.90841V2.50008C11.0917 2.04175 10.7167 1.66675 10.2583 1.66675H6.72501C4.15834 1.66675 2.08334 3.33341 2.08334 6.30841V13.6917C2.08334 16.6667 4.15834 18.3334 6.72501 18.3334H13.275C15.8417 18.3334 17.9167 16.6667 17.9167 13.6917V9.32508C17.9167 8.86675 17.5417 8.49175 17.0833 8.49175Z" fill="currentColor" />
                                <path d="M13.1667 1.84158C12.825 1.49991 12.2333 1.73325 12.2333 2.20825V5.11658C12.2333 6.33325 13.2667 7.34158 14.525 7.34158C15.3167 7.34991 16.4167 7.34991 17.3583 7.34991C17.8333 7.34991 18.0833 6.79158 17.75 6.45825C16.55 5.24991 14.4 3.07491 13.1667 1.84158Z" fill="currentColor" />
                                <path d="M11.25 11.4583H6.25C5.90833 11.4583 5.625 11.1749 5.625 10.8333C5.625 10.4916 5.90833 10.2083 6.25 10.2083H11.25C11.5917 10.2083 11.875 10.4916 11.875 10.8333C11.875 11.1749 11.5917 11.4583 11.25 11.4583Z" fill="currentColor" />
                                <path d="M9.58333 14.7917H6.25C5.90833 14.7917 5.625 14.5084 5.625 14.1667C5.625 13.8251 5.90833 13.5417 6.25 13.5417H9.58333C9.925 13.5417 10.2083 13.8251 10.2083 14.1667C10.2083 14.5084 9.925 14.7917 9.58333 14.7917Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Drafts</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                    <button @click="activeTab = 'trash'" :class="activeTab === 'trash' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.29166 5.13898C2.29166 4.75545 2.57947 4.44454 2.93451 4.44454L5.15471 4.44417C5.59584 4.43209 5.985 4.12909 6.13511 3.68084C6.13905 3.66906 6.14359 3.65452 6.15987 3.60177L6.25553 3.29169C6.31407 3.10157 6.36508 2.93594 6.43644 2.78789C6.7184 2.20299 7.24005 1.79683 7.84288 1.69285C7.99547 1.66653 8.15706 1.66664 8.34254 1.66677H11.2409C11.4264 1.66664 11.588 1.66653 11.7406 1.69285C12.3434 1.79683 12.8651 2.20299 13.147 2.78789C13.2184 2.93594 13.2694 3.10157 13.3279 3.29169L13.4236 3.60177C13.4399 3.65452 13.4444 3.66906 13.4484 3.68084C13.5985 4.12909 14.0648 4.43246 14.5059 4.44454H16.6488C17.0038 4.44454 17.2917 4.75545 17.2917 5.13898C17.2917 5.5225 17.0038 5.83342 16.6488 5.83342H2.93451C2.57947 5.83342 2.29166 5.5225 2.29166 5.13898Z" fill="currentColor" />
                                <path opacity="0.3" d="M9.67232 18.3333H10.3281C12.5843 18.3333 13.7125 18.3333 14.4459 17.6139C15.1794 16.8946 15.2545 15.7146 15.4046 13.3547L15.6208 9.95428C15.7023 8.67382 15.743 8.03358 15.375 7.62788C15.007 7.22217 14.3856 7.22217 13.1429 7.22217H6.85755C5.61477 7.22217 4.99337 7.22217 4.62541 7.62788C4.25744 8.03358 4.29815 8.67382 4.37959 9.95428L4.59584 13.3547C4.74593 15.7146 4.82097 16.8946 5.55446 17.6139C6.28795 18.3333 7.41607 18.3333 9.67232 18.3333Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Trash</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                    <button @click="activeTab = 'archive'" :class="activeTab === 'archive' ? 'text-primary' : 'hover:text-primary text-gray'" class="flex items-center gap-3 justify-between">
                        <div class="flex items-center gap-2.5">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.58332 17.5001H10.4167C13.5594 17.5001 15.1307 17.5001 16.107 16.5238C17.0833 15.5475 17.0833 13.9761 17.0833 10.8334V5.83179C16.9623 5.83348 16.7924 5.83345 16.6667 5.83343H3.33332C3.20753 5.83345 3.03766 5.83348 2.91666 5.83179V10.8334C2.91666 13.9761 2.91666 15.5475 3.89297 16.5238C4.86928 17.5001 6.44063 17.5001 9.58332 17.5001ZM7.56342 9.26451C7.49999 9.41765 7.49999 9.6118 7.49999 10.0001C7.49999 10.3884 7.49999 10.5825 7.56342 10.7357C7.648 10.9398 7.81023 11.1021 8.01442 11.1866C8.16756 11.2501 8.36171 11.2501 8.74999 11.2501H11.25C11.6383 11.2501 11.8324 11.2501 11.9856 11.1866C12.1897 11.1021 12.352 10.9398 12.4366 10.7357C12.5 10.5825 12.5 10.3884 12.5 10.0001C12.5 9.6118 12.5 9.41765 12.4366 9.26451C12.352 9.06032 12.1897 8.89809 11.9856 8.81352C11.8324 8.75008 11.6383 8.75008 11.25 8.75008H8.74999C8.36171 8.75008 8.16756 8.75008 8.01442 8.81352C7.81023 8.89809 7.648 9.06032 7.56342 9.26451Z" fill="currentColor" />
                                <path opacity="0.3" d="M1.66666 4.16667C1.66666 3.38099 1.66666 2.98816 1.91073 2.74408C2.15481 2.5 2.54765 2.5 3.33332 2.5H16.6667C17.4523 2.5 17.8452 2.5 18.0892 2.74408C18.3333 2.98816 18.3333 3.38099 18.3333 4.16667C18.3333 4.95234 18.3333 5.34518 18.0892 5.58926C17.8452 5.83333 17.4523 5.83333 16.6667 5.83333H3.33332C2.54765 5.83333 2.15481 5.83333 1.91073 5.58926C1.66666 5.34518 1.66666 4.95234 1.66666 4.16667Z" fill="currentColor" />
                            </svg>
                            <span class="text-sm">Archive</span>
                        </div>
                        <p class="text-xs font-semibold">22</p>
                    </button>
                </div>
                <div class="my-3.5">
                    <a href="javascript:;" class="flex items-center gap-1.5 text-primary justify-end">More
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.29241 4.70711C0.901881 4.31658 0.90188 3.68342 1.29241 3.29289C1.68293 2.90237 2.31609 2.90237 2.70662 3.29289L5.99951 6.58579L9.2924 3.29289C9.68293 2.90237 10.3161 2.90237 10.7066 3.29289C11.0971 3.68342 11.0971 4.31658 10.7066 4.70711L6.70662 8.70711C6.31609 9.09763 5.68293 9.09763 5.2924 8.70711L1.29241 4.70711Z" fill="currentColor" />
                        </svg>
                    </a>
                </div>
                <div class="space-y-5">
                    <div class="flex items-center gap-2 justify-between">
                        <p>Labels</p>
                        <div class="flex items-center gap-5">
                            <button>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3" d="M11.9995 22C7.28547 22 4.92844 22 3.46398 20.5355C1.99951 19.0711 1.99951 16.714 1.99951 12C1.99951 7.28595 1.99951 4.92893 3.46398 3.46447C4.92844 2 7.28547 2 11.9995 2C16.7136 2 19.0706 2 20.535 3.46447C21.9995 4.92893 21.9995 7.28595 21.9995 12C21.9995 16.714 21.9995 19.0711 20.535 20.5355C19.0706 22 16.7136 22 11.9995 22Z" fill="currentColor" />
                                    <path d="M11.9995 8.25C12.4137 8.25 12.7495 8.58579 12.7495 9V11.25H14.9995C15.4137 11.25 15.7495 11.5858 15.7495 12C15.7495 12.4142 15.4137 12.75 14.9995 12.75H12.7495L12.7495 15C12.7495 15.4142 12.4137 15.75 11.9995 15.75C11.5853 15.75 11.2495 15.4142 11.2495 15V12.75H8.99951C8.5853 12.75 8.24951 12.4142 8.24951 12C8.24951 11.5858 8.5853 11.25 8.99951 11.25H11.2495L11.2495 9C11.2495 8.58579 11.5853 8.25 11.9995 8.25Z" fill="currentColor" />
                                </svg>
                            </button>
                            <button>
                                <svg width="4" height="18" viewBox="0 0 4 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="1.99951" cy="2" r="2" transform="rotate(90 1.99951 2)" fill="currentColor" />
                                    <circle cx="1.99951" cy="9" r="2" transform="rotate(90 1.99951 9)" fill="currentColor" />
                                    <circle cx="1.99951" cy="16" r="2" transform="rotate(90 1.99951 16)" fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="space-y-5">
                        <p><a href="javascript:;" class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</a></p>
                        <p><a href="javascript:;" class="bg-primary/10 text-primary text-xs/none py-1.5 px-2.5 inline-block rounded-full">Meeting</a></p>
                        <p><a href="javascript:;" class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 inline-block rounded-full">Application</a></p>
                        <p><a href="javascript:;" class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 inline-block rounded-full">Documents</a></p>
                    </div>
                </div>
            </div>
            <div class="bg-dark/90 dark:bg-white/5 backdrop-blur-sm lg:hidden z-[5] w-full h-full absolute rounded-lg hidden" :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
            <div x-show="activeTab === 'compose'" class="flex flex-row items-start gap-4 relative w-full">
                <div class="w-full flex flex-col flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                    <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                        <div class="flex items-center gap-5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                </svg>
                            </button>
                            <p class="font-semibold text-sm flex-1">New Message</p>
                        </div>
                    </div>
                    <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                        <div class="flex items-center gap-6">
                            <span class="text-sm/none shrink-0">To:</span>
                            <div class="relative">
                                <div class="overflow-visible relative border-gray/20 border-2 rounded-full px-3 py-2.5 flex items-center gap-6">
                                    <img class="absolute -left-2 top-1/2 -translate-y-1/2 w-9 h-9 rounded-full" src="{{ asset('assets/images/avatar-3.png') }}">
                                    <p class="text-sm/none font-semibold ml-6">Alice Davis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                        <div class="flex items-center gap-5">
                            <span class="text-sm/none shrink-0">Subject:</span>
                            <input type="text" id="inputSubject" placeholder="Type Subject" class="form-control w-full text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent">
                        </div>
                    </div>
                    <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10 flex-1">
                        <textarea class="form-control w-full h-full text-sm p-0 !border-none placeholder:text-gray focus:ring-0 bg-transparent" id="textareaMessage" placeholder="Type Message:"></textarea>
                    </div>
                    <div class="dark:border-gray/20 border-lightgray/10 p-5">
                        <div class="flex items-center gap-5 justify-between flex-wrap">
                            <div class="flex items-center gap-5 flex-wrap">
                                <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                    Send
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor"></path>
                                        <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                                <div class="flex items-center flex-wrap gap-5">
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                            <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                            <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_509_8396)">
                                                <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6"></circle>
                                                <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                                <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor"></path>
                                                <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor"></ellipse>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_509_8396">
                                                    <rect width="20" height="20" fill="white" transform="translate(-0.000488281)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_509_8401)">
                                                <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6"></path>
                                                <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6"></circle>
                                                <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                                <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_509_8401">
                                                    <rect width="20" height="20" fill="white" transform="translate(-0.000488281)"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_509_8406)">
                                                <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6"></path>
                                                <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                                <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                                <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                                <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_509_8406">
                                                    <rect x="-0.000488281" width="20" height="20" rx="5" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </button>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.99951" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="8.99951" cy="2" r="2" fill="currentColor"></circle>
                                            <circle cx="15.9995" cy="2" r="2" fill="currentColor"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div>
                                <button class="text-lightgray hover:text-primary duration-300">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                        <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'inbox'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkMail" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-3.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Charles Macomber</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 rounded-full">Document</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSelectedMail" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-13.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Julie Dick</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 rounded-full">Work</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail1" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 rounded-full">Application</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail2" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-11.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Alice Davis</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-primary/10 text-primary text-xs/none py-1.5 px-2.5 rounded-full">Meeting</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail3" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-2.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Edward Masry</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 rounded-full">Document</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'started'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail4" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail5" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-11.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Alice Davis</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-primary/10 text-primary text-xs/none py-1.5 px-2.5 rounded-full">Meeting</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail6" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-2.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Edward Masry</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 rounded-full">Document</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'sent'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail7" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail8" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 rounded-full">Application</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail9" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-2.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Edward Masry</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 rounded-full">Document</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'drafts'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail10" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail11" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-13.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Julie Dick</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 rounded-full">Work</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail12" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 rounded-full">Application</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail13" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-11.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Alice Davis</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-primary/10 text-primary text-xs/none py-1.5 px-2.5 rounded-full">Meeting</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'trash'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail14" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail15" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 rounded-full">Application</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail16" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-2.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Edward Masry</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-purple/10 text-purple text-xs/none py-1.5 px-2.5 rounded-full">Document</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div x-show="activeTab === 'archive'" x-data="{selectedMail: false}" class="flex flex-row items-start gap-4 relative w-full h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                <div class="lg:max-w-[300px] xl:max-w-md w-full flex-1 rounded-lg bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 overflow-hidden">
                    <div class="bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 p-5 flex justify-between items-center gap-2.5">
                        <div class="flex items-center gap-2.5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300" @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor" />
                                </svg>
                            </button>
                            <input type="checkbox" id="checkSendMail17" class="form-checkbox m-0">
                            <p class="font-semibold line-clamp-1">Mail Inbox <span class="text-xs">20 messages </span></p>
                        </div>
                        <div class="flex items-center gap-5">
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.9995 7L3.99951 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.5" d="M17.9995 12L6.99951 12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    <path opacity="0.3" d="M14.9995 17H9.99951" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_8004)">
                                        <path opacity="0.3" d="M16.4399 9.10718C17.0339 11.3313 16.4584 13.8027 14.7136 15.5476C12.1101 18.1511 7.88896 18.1511 5.28547 15.5476C2.68197 12.9441 2.68197 8.723 5.28547 6.1195C7.88896 3.51601 12.1101 3.51601 14.7136 6.1195L15.3028 6.70876" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.7673 6.70857H15.3028V3.17303" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_8004">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                            <button type="button" class="h-5 w-5 flex items-center justify-center duration-300 hover:text-primary text-lightgray">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_479_7999)">
                                        <circle cx="9.58284" cy="9.58335" r="7.91667" stroke="currentColor" stroke-width="1.8" />
                                        <path opacity="0.3" d="M16.6662 16.6667L18.3329 18.3334" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_479_7999">
                                            <rect width="20" height="20" fill="currentColor" transform="translate(-0.000488281)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="overflow-y-auto h-[calc(100vh-258px)] sm:h-[calc(100vh-274px)] ">
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail18" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-13.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Julie Dick</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 rounded-full">Work</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="h-[2px] bg-lightgray/10 w-full dark:bg-gray/20"></div>
                        <button class="w-full duration-300 p-5" @click="selectedMail = !selectedMail">
                            <div class="flex items-start gap-3.5">
                                <div class="flex items-center gap-2.5 shrink-0">
                                    <input type="checkbox" id="checkSendMail19" class="form-checkbox m-0">
                                    <img src="{{ asset('assets/images/avatar-10.png') }}" class="w-[42px] h-[42px] rounded-full" alt="">
                                </div>
                                <div class="text-left flex-1">
                                    <div class="flex items-center gap-1 justify-between">
                                        <p class="text-sm font-semibold">Bob Briscoe</p>
                                        <p class="text-xs">Today, <span class="text-lightgray">10min ago</span></p>
                                    </div>
                                    <p class="text-xs font-semibold text-lightgray mt-2">How are you today?</p>
                                    <p class="mt-2 text-gray text-xs">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <div class="flex items-center gap-2 justify-between mt-3">
                                        <div class="flex items-center gap-5">
                                            <div class="flex items-center gap-1">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.27785 12.3712L10.5384 7.33568C11.17 6.7311 11.17 5.75089 10.5384 5.14632C9.90684 4.54174 8.88282 4.54174 8.25122 5.14632L3.02876 10.1454C1.82872 11.294 1.82872 13.1564 3.02876 14.3051C4.22879 15.4538 6.17443 15.4538 7.37446 14.3051L12.6732 9.23312C14.4416 7.54031 14.4416 4.79573 12.6732 3.10292C10.9047 1.41011 8.03744 1.41011 6.26897 3.10292L1.99951 7.18972" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                                <span>+5</span>
                                            </div>
                                            <span class="bg-orange/10 text-orange text-xs/none py-1.5 px-2.5 rounded-full">Application</span>
                                        </div>
                                        <div class="shrink-0">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_479_8038)">
                                                    <path d="M6.10162 4.10556C6.94605 2.59073 7.36827 1.83331 7.99951 1.83331C8.63075 1.83331 9.05296 2.59073 9.8974 4.10556L10.1159 4.49747C10.3558 4.92794 10.4758 5.14317 10.6629 5.28518C10.85 5.4272 11.0829 5.47991 11.5489 5.58535L11.9731 5.68133C13.6129 6.05235 14.4328 6.23786 14.6279 6.86513C14.823 7.49241 14.264 8.14603 13.1461 9.45326L12.8569 9.79146C12.5392 10.1629 12.3804 10.3487 12.3089 10.5785C12.2375 10.8082 12.2615 11.0561 12.3095 11.5517L12.3532 12.0029C12.5223 13.747 12.6068 14.6191 12.0961 15.0068C11.5854 15.3945 10.8177 15.041 9.28239 14.3341L8.88518 14.1512C8.44889 13.9503 8.23074 13.8499 7.99951 13.8499C7.76827 13.8499 7.55012 13.9503 7.11383 14.1512L6.71662 14.3341C5.18129 15.041 4.41362 15.3945 3.90294 15.0068C3.39225 14.6191 3.47676 13.747 3.64577 12.0029L3.6895 11.5517C3.73752 11.0561 3.76154 10.8082 3.69008 10.5785C3.61863 10.3487 3.45979 10.1629 3.14212 9.79146L2.85291 9.45326C1.73501 8.14603 1.17606 7.49241 1.37112 6.86513C1.56618 6.23786 2.38608 6.05235 4.02586 5.68133L4.4501 5.58535C4.91607 5.47991 5.14906 5.4272 5.33614 5.28518C5.52321 5.14317 5.64319 4.92794 5.88315 4.49747L6.10162 4.10556Z" stroke="currentColor" stroke-width="1.8" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_479_8038">
                                                        <rect x="-0.000488281" y="0.5" width="16" height="16" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-2 justify-between overflow-y-auto rounded-lg absolute top-0 -right-full w-full bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 md:static h-full" :class="selectedMail && '!right-0'">
                    <div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-3.5 flex-1">
                                    <button @click="selectedMail = !selectedMail" class="text-gray hover:text-primary md:hidden">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0303 6.46967C9.73744 6.17678 9.26256 6.17678 8.96967 6.46967L3.96967 11.4697C3.67678 11.7626 3.67678 12.2374 3.96967 12.5303L8.96967 17.5303C9.26256 17.8232 9.73744 17.8232 10.0303 17.5303C10.3232 17.2374 10.3232 16.7626 10.0303 16.4697L5.56066 12L10.0303 7.53033C10.3232 7.23744 10.3232 6.76256 10.0303 6.46967Z" fill="currentColor" />
                                            <g opacity="0.5">
                                                <path d="M6.31066 11.25H14.5C15.4534 11.25 16.8667 11.5298 18.0632 12.3914C19.298 13.2804 20.25 14.7556 20.25 17C20.25 17.4142 19.9142 17.75 19.5 17.75C19.0858 17.75 18.75 17.4142 18.75 17C18.75 15.2444 18.0353 14.2196 17.1868 13.6087C16.3 12.9702 15.2133 12.75 14.5 12.75L6.31066 12.75L5.56066 12L6.31066 11.25Z" fill="currentColor" />
                                                <path d="M3.80691 11.7129C3.77024 11.8013 3.75 11.8983 3.75 12C3.75 11.9023 3.76897 11.8046 3.80691 11.7129Z" fill="currentColor" />
                                            </g>
                                        </svg>
                                    </button>
                                    <img src="{{ asset('assets/images/avatar-9.png') }}" class="h-[42px] rounded-full" alt="">
                                    <div class="space-y-1.5">
                                        <div class="flex items-center gap-2.5 gap-y-1 flex-wrap">
                                            <div class="flex items-center gap-1.5">
                                                <span>
                                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6.10163 3.60556C6.94606 2.09073 7.36828 1.33331 7.99952 1.33331C8.63076 1.33331 9.05298 2.09073 9.89741 3.60556L10.1159 3.99747C10.3558 4.42794 10.4758 4.64317 10.6629 4.78518C10.85 4.9272 11.083 4.97991 11.5489 5.08535L11.9732 5.18133C13.613 5.55235 14.4328 5.73786 14.6279 6.36513C14.823 6.99241 14.264 7.64603 13.1461 8.95326L12.8569 9.29146C12.5392 9.66294 12.3804 9.84867 12.3089 10.0785C12.2375 10.3082 12.2615 10.5561 12.3095 11.0517L12.3533 11.5029C12.5223 13.247 12.6068 14.1191 12.0961 14.5068C11.5854 14.8945 10.8177 14.541 9.28241 13.8341L8.8852 13.6512C8.4489 13.4503 8.23076 13.3499 7.99952 13.3499C7.76829 13.3499 7.55014 13.4503 7.11385 13.6512L6.71664 13.8341C5.18131 14.541 4.41364 14.8945 3.90295 14.5068C3.39227 14.1191 3.47677 13.247 3.64579 11.5029L3.68951 11.0517C3.73754 10.5561 3.76155 10.3082 3.6901 10.0785C3.61864 9.84867 3.45981 9.66294 3.14213 9.29146L2.85292 8.95326C1.73502 7.64603 1.17607 6.99241 1.37114 6.36513C1.5662 5.73786 2.38609 5.55235 4.02588 5.18133L4.45011 5.08535C4.91609 4.97991 5.14908 4.9272 5.33615 4.78518C5.52322 4.64317 5.64321 4.42794 5.88317 3.99747L6.10163 3.60556Z" fill="#FFC41F" />
                                                    </svg>
                                                </span>
                                                <p class="font-semibold text-sm">New Project Lead</p>
                                            </div>
                                            <p class="text-gray text-xs">juliedick@gmail.com</p>
                                        </div>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray text-xs">To: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                            <p class="text-gray text-xs">Cc: <span class="text-dark dark:text-white font-semibold">You</span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="shrink-0 sm:block hidden">
                                    <p class="text-gray text-xs">20 Messages</p>
                                </div>
                            </div>
                        </div>
                        <div class="dark:border-gray/20 border-b-2 border-lightgray/10 p-5">
                            <div class="space-y-5">
                                <div class="flex items-center gap-3.5">
                                    <span class="bg-gray/10 text-gray text-xs/none py-1.5 px-2.5 inline-block rounded">Inbox</span>
                                    <span class="bg-pink/10 text-pink text-xs/none py-1.5 px-2.5 inline-block rounded-full">Work</span>
                                </div>
                                <div>
                                    <p class="font-semibold">Dashhub Dashboard UI Kit</p>
                                    <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                                </div>
                                <div class="flex items-center flex-wrap gap-2.5">
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-purple">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M8.95147 1.77103e-07H9.04755C10.9802 -1.06016e-05 12.4947 -1.91331e-05 13.6764 0.158858C14.886 0.321477 15.8404 0.660832 16.5895 1.40997C17.3387 2.15912 17.678 3.11356 17.8407 4.3231C17.9995 5.50481 17.9995 7.01936 17.9995 8.95197V9.02588C17.9995 10.6239 17.9995 11.9321 17.9127 12.9973C17.8255 14.0677 17.6468 14.9621 17.2468 15.705C17.0703 16.0326 16.8535 16.326 16.5895 16.59C15.8404 17.3392 14.886 17.6785 13.6764 17.8411C12.4947 18 10.9802 18 9.04754 18H8.95148C7.01887 18 5.50432 18 4.32261 17.8411C3.11307 17.6785 2.15863 17.3392 1.40949 16.59C0.745346 15.9259 0.402375 15.0993 0.219992 14.0738C0.0408275 13.0665 0.00805295 11.8133 0.00124398 10.2571C-0.000487904 9.86121 -0.000487905 9.44254 -0.000487905 9.00084L-0.000488104 8.95196C-0.000498883 7.01935 -0.000507414 5.50481 0.158369 4.3231C0.320989 3.11356 0.660343 2.15912 1.40949 1.40997C2.15863 0.660832 3.11307 0.321477 4.32261 0.158858C5.50432 -1.91331e-05 7.01887 -1.06016e-05 8.95147 1.77103e-07Z" fill="currentColor" />
                                                <path d="M16.7426 10.0721L16.5566 10.0463C14.1758 9.7167 11.9971 10.9544 10.8877 12.82C9.45654 9.19904 5.67448 6.72965 1.4485 7.33646L1.25948 7.36372C1.25544 7.86323 1.25533 8.40676 1.25533 9.00011C1.25533 9.44273 1.25533 9.85883 1.25705 10.2517C1.26391 11.8207 1.29898 12.969 1.4564 13.8541C1.6106 14.721 1.87296 15.2776 2.29748 15.7021C2.7744 16.1791 3.41966 16.4527 4.48995 16.5966C5.5783 16.743 7.00844 16.7443 8.99951 16.7443C10.9906 16.7443 12.4207 16.743 13.5091 16.5966C14.5794 16.4527 15.2246 16.1791 15.7015 15.7021C15.8773 15.5264 16.0214 15.332 16.1411 15.1097C16.4187 14.5941 16.5789 13.9043 16.6611 12.8954C16.7242 12.1202 16.7391 11.1975 16.7426 10.0721Z" fill="currentColor" />
                                                <path d="M14.0228 5.65123C14.0228 6.57598 13.2731 7.32564 12.3484 7.32564C11.4236 7.32564 10.674 6.57598 10.674 5.65123C10.674 4.72647 11.4236 3.97681 12.3484 3.97681C13.2731 3.97681 14.0228 4.72647 14.0228 5.65123Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Schedule.png</span>
                                    </div>
                                    <div class="flex items-center gap-2.5 py-3 px-3.5 border-2 border-gray/10 rounded-full cursor-pointer">
                                        <span class="text-primary">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" d="M-0.000488281 9C-0.000488281 6.04127 -0.000488281 4.5619 0.816674 3.56618C0.96627 3.3839 1.13341 3.21676 1.3157 3.06716C2.31141 2.25 3.79078 2.25 6.74951 2.25C9.70824 2.25 11.1876 2.25 12.1833 3.06716C12.3656 3.21676 12.5328 3.3839 12.6823 3.56618C13.4995 4.5619 13.4995 6.04127 13.4995 9V9.9C13.4995 12.8587 13.4995 14.3381 12.6823 15.3338C12.5328 15.5161 12.3656 15.6832 12.1833 15.8328C11.1876 16.65 9.70824 16.65 6.74951 16.65C3.79078 16.65 2.31141 16.65 1.3157 15.8328C1.13341 15.6832 0.96627 15.5161 0.816674 15.3338C-0.000488281 14.3381 -0.000488281 12.8587 -0.000488281 9.9V9Z" fill="currentColor" />
                                                <path d="M13.4995 7.20032L14.092 6.90406C15.8433 6.02841 16.719 5.59058 17.3592 5.98629C17.9995 6.38199 17.9995 7.361 17.9995 9.31901V9.58163C17.9995 11.5396 17.9995 12.5186 17.3592 12.9144C16.719 13.3101 15.8433 12.8722 14.092 11.9966L13.4995 11.7003V7.20032Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <span class="text-xs">Meeting.mp4</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-2.5">
                                <a href="javascript:;">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0298 6.96967C9.73695 6.67678 9.26207 6.67678 8.96918 6.96967L3.96918 11.9697C3.67629 12.2626 3.67629 12.7374 3.96918 13.0303L8.96918 18.0303C9.26207 18.3232 9.73695 18.3232 10.0298 18.0303C10.3227 17.7374 10.3227 17.2626 10.0298 16.9697L5.56017 12.5L10.0298 8.03033C10.3227 7.73744 10.3227 7.26256 10.0298 6.96967Z" fill="currentColor" />
                                        <g opacity="0.3">
                                            <path d="M6.31017 11.75H14.4995C15.4529 11.75 16.8662 12.0298 18.0627 12.8914C19.2975 13.7804 20.2495 15.2556 20.2495 17.5C20.2495 17.9142 19.9137 18.25 19.4995 18.25C19.0853 18.25 18.7495 17.9142 18.7495 17.5C18.7495 15.7444 18.0348 14.7196 17.1863 14.1087C16.2995 13.4702 15.2128 13.25 14.4995 13.25L6.31017 13.25L5.56017 12.5L6.31017 11.75Z" fill="currentColor" />
                                            <path d="M3.80642 12.2129C3.76975 12.3013 3.74951 12.3983 3.74951 12.5C3.74951 12.4023 3.76848 12.3046 3.80642 12.2129Z" fill="currentColor" />
                                        </g>
                                    </svg>
                                </a>
                                <span class="flex items-stretch border-2 border-gray/10 rounded-full overflow-hidden">
                                    <div class="bg-gray/50 text-white py-2 px-2.5 text-xs/none">To</div>
                                    <div class="flex items-center gap-2.5 px-3">
                                        <img src="{{ asset('assets/images/avatar-3.png') }}" class="h-5 rounded-full" alt="">
                                        <span class="font-semibold text-sm">Bob Briscoe</span>
                                    </div>
                                </span>
                            </div>
                            <p class="mt-2 text-xs/loose font-normal text-gray">An advanced Dashboard / SaaS UI kit and design system for Figma. It can help you quickly build Dashboard, SaaS and other projects, and has a very good user experience.</p>
                        </div>
                        <div class="dark:border-gray/20 border-t-2 border-lightgray/10 p-5">
                            <div class="flex items-center gap-5 justify-between flex-wrap">
                                <div class="flex items-center gap-5 flex-wrap">
                                    <button type="button" class="flex items-center gap-5 bg-primary text-white py-3 px-3.5 rounded-full text-sm font-semibold">
                                        Send
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.6065 11.9716C10.7021 12.1626 10.619 12.3948 10.4239 12.4818L3.37261 15.6263C2.25074 16.1266 1.08706 15.0156 1.64276 13.9748L4.00678 9.54704C4.19064 9.20267 4.19064 8.79733 4.00678 8.45296L1.64276 4.02517C1.08706 2.98435 2.25074 1.87342 3.37261 2.37372L6.01584 3.55247C6.333 3.6939 6.59126 3.941 6.74656 4.2516L10.6065 11.9716Z" fill="currentColor" />
                                            <path opacity="0.3" d="M11.6498 11.5429C11.7395 11.7224 11.9546 11.7994 12.1379 11.7177L15.7548 10.1048C16.7476 9.66201 16.7476 8.33869 15.7548 7.89594L9.08152 4.91999C8.75999 4.7766 8.43593 5.1153 8.59338 5.43018L11.6498 11.5429Z" fill="currentColor" />
                                        </svg>
                                    </button>
                                    <div class="flex items-center flex-wrap gap-5">
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.99952 2.5H6.66619C5.09484 2.5 4.30917 2.5 3.82101 2.98816C3.33286 3.47631 3.33286 4.26199 3.33286 5.83333V6.625M9.99952 2.5H13.3329C14.9042 2.5 15.6899 2.5 16.178 2.98816C16.6662 3.47631 16.6662 4.26199 16.6662 5.83333V6.625M9.99952 2.5V17.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.83286 17.5H14.1662" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5.93764 13.3551L11.8558 7.69016C12.5663 7.01001 12.5663 5.90728 11.8558 5.22713C11.1453 4.54699 9.99323 4.54698 9.28268 5.22713L3.40741 10.851C2.05738 12.1433 2.05738 14.2385 3.40741 15.5308C4.75745 16.8231 6.94629 16.8231 8.29632 15.5308L14.2574 9.82478C16.2469 7.92037 16.2469 4.83272 14.2574 2.92831C12.2678 1.0239 9.04218 1.0239 7.05265 2.92831L2.24951 7.52596" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8016 15.4064L11.2009 16.0071C9.21036 17.9976 5.98301 17.9976 3.99244 16.0071C2.00187 14.0165 2.00187 10.7892 3.99244 8.79858L4.59315 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 11.8021L11.8016 8.19788" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                <path d="M8.19736 4.59363L8.79806 3.99293C10.7886 2.00236 14.016 2.00236 16.0066 3.99293C17.9971 5.9835 17.9971 9.21085 16.0066 11.2014L15.4058 11.8021" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8396)">
                                                    <circle cx="9.9995" cy="9.99996" r="8.33333" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M7.49951 13.3334C8.20816 13.8586 9.06998 14.1667 9.99951 14.1667C10.929 14.1667 11.7909 13.8586 12.4995 13.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M13.3328 8.75C13.3328 9.44036 12.9597 10 12.4995 10C12.0393 10 11.6662 9.44036 11.6662 8.75C11.6662 8.05964 12.0393 7.5 12.4995 7.5C12.9597 7.5 13.3328 8.05964 13.3328 8.75Z" fill="currentColor" />
                                                    <ellipse cx="7.4995" cy="8.75" rx="0.833333" ry="1.25" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8396">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8401)">
                                                    <path d="M1.66617 9.99996C1.66617 6.07159 1.66617 4.1074 2.88656 2.88701C4.10695 1.66663 6.07113 1.66663 9.9995 1.66663C13.9279 1.66663 15.8921 1.66663 17.1124 2.88701C18.3328 4.1074 18.3328 6.07159 18.3328 9.99996C18.3328 13.9283 18.3328 15.8925 17.1124 17.1129C15.8921 18.3333 13.9279 18.3333 9.9995 18.3333C6.07113 18.3333 4.10695 18.3333 2.88656 17.1129C1.66617 15.8925 1.66617 13.9283 1.66617 9.99996Z" stroke="currentColor" stroke-width="1.6" />
                                                    <circle cx="13.3328" cy="6.66667" r="1.66667" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M1.66617 8.46157L2.48345 8.34422C8.29863 7.50922 13.2693 12.5262 12.3805 18.3334" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M18.3328 11.1538L17.5216 11.0415C15.1519 10.7134 13.0076 11.8932 11.9034 13.7501" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8401">
                                                        <rect width="20" height="20" fill="white" transform="translate(-0.000488281)" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_509_8406)">
                                                    <path d="M1.6662 10C1.6662 6.85734 1.6662 5.286 2.64251 4.30968C3.61882 3.33337 5.19017 3.33337 8.33287 3.33337H11.6662C14.8089 3.33337 16.3802 3.33337 17.3566 4.30968C18.3329 5.286 18.3329 6.85734 18.3329 10V11.6667C18.3329 14.8094 18.3329 16.3808 17.3566 17.3571C16.3802 18.3334 14.8089 18.3334 11.6662 18.3334H8.33287C5.19017 18.3334 3.61882 18.3334 2.64251 17.3571C1.6662 16.3808 1.6662 14.8094 1.6662 11.6667V10Z" stroke="currentColor" stroke-width="1.6" />
                                                    <path d="M14.9995 13.3333L13.3329 13.3333M13.3329 13.3333L11.6662 13.3333M13.3329 13.3333L13.3329 11.6666M13.3329 13.3333L13.3329 15" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M5.83282 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M14.1662 3.33337V2.08337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                    <path d="M2.08282 7.5H17.9162" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_509_8406">
                                                        <rect x="-0.000488281" width="20" height="20" rx="5" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </button>
                                        <button class="text-lightgray hover:text-primary duration-300">
                                            <svg width="18" height="4" viewBox="0 0 18 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="8.99951" cy="2" r="2" fill="currentColor" />
                                                <circle cx="15.9995" cy="2" r="2" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <button class="text-lightgray hover:text-primary duration-300">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.17017 4C9.582 2.83481 10.6932 2 11.9995 2C13.3057 2 14.4169 2.83481 14.8288 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M20.4995 6H3.49945" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M18.8329 8.5L18.3729 15.3991C18.1959 18.054 18.1074 19.3815 17.2424 20.1907C16.3774 21 15.047 21 12.3862 21H11.6129C8.95205 21 7.62165 21 6.75664 20.1907C5.89163 19.3815 5.80313 18.054 5.62614 15.3991L5.1662 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M9.49951 11L9.99951 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                            <path d="M14.4995 11L13.9995 16" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("email", () => ({
            isShowChatMenu: false,
            selectMail: false,
        }));
    });
</script>

@endsection