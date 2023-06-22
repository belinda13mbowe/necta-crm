<?php


function admin($user){
    $url = base_url();
    return "
                    <!-- partial:partials/_sidebar.html -->
            <nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
                <ul class=\"nav\">
                    <li class=\"nav-item nav-profile\">
                        <a href=\"{$url}Main\" class=\"nav-link\">
                            <div class=\"profile-image\">
                                <img class=\"img-xs rounded-circle\" src=\"{$url}public/assets/images/faces/face8.jpg\" alt=\"profile image\">
                                <div class=\"dot-indicator bg-success\"></div>
                            </div>
                            <div class=\"text-wrapper\">
                                <p class=\"profile-name\">{$user}</p>
                            </div>
                        </a>
                    </li>
                
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{$url}Admin\">
                            <i class=\"menu-icon typcn typcn-document-text\"></i>
                            <span class=\"menu-title\">DASH-BOARD</span>
                        </a>
                    </li>
                    
                    <li class=\"nav-item\">
                    <!--id=\"dropdownMenuLink\"-->
                        <a class=\"  nav-link\"  href=\"{$url}Admin\">
                            <i class=\"menu-icon typcn typcn-document-text\"></i>
                            <span class=\"menu-title\">REGISTRATION</span>
                       </a>    <!--  <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class=\"dropdown-item\" href=\"{$url}Registration\">Action</a></div>-->
                    </li>
                 
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{$url}Admin\">
                            <i class=\"menu-icon typcn typcn-document-text\"></i>
                            <span class=\"menu-title\">CERTIFICATION</span>
                        </a>
                    </li>
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"{$url}Admin\">
                            <i class=\"menu-icon typcn typcn-document-text\"></i>
                            <span class=\"menu-title\">VERIFICATION</span>
                        </a>
                    </li>
                   
                </ul>
            </nav>
            <!-- partial -->
    ";
}