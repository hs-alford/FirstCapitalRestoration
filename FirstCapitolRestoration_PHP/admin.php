<!DOCTYPE html>

<html>
<head>
    
    <meta name="viewport" content="width=device-width" />
    <title>Admin Section First Capitol Restoration</title>
    <link rel="stylesheet" href="../../public/assets/dist/css/tabler.min.css" />
    <link rel="stylesheet" href="../../public/assets//dist/libs/bootstrap/dist/js/bootstrap.min.js" />
    <style>
        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        #gallery .card {
            flex-grow: 1;
        }

        .section {
            background-color: white;
        }

            .section .card {
                background-color: #f6faff;
            }

            .card-title {
                font-size: 1.05rem;
            }
            
      </style>
</head>
<body>

    
    <form action="/admin/update/<%= results1[0].id %>" method="post" >
        <header class="navbar navbar-expand-md fixed-top d-print-none" data-bs-theme="dark" style="background-color:black;">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="." style="color:white;">
                    First Captiol Restoration
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <div class="nav-item d-none d-md-flex me-3">
                    <div class="btn-list">
                            <button type="submit" class="btn btn-primary ms-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 11l3 3l8 -8"></path>
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path>
                                </svg>                           Save
                            </button>
                        <a href="/" class="btn">
                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-up-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M6 18v-6a3 3 0 0 1 3 -3h10l-4 -4m0 8l4 -4"></path>
                            </svg>                            Return To Webpage
                        </a>
                        
    
                    </div>
                </div>
    
            </div>
        </div>
    </header>
        <div class="page-header d-print-none" style="padding-top:5.7em;">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Admin Page
                        </div>
                        <h2 class="page-title">
                             Website Editor
                        </h2>
                    </div>
                    <!-- Page title actions -->
    
                </div>
            </div>
        </div>
    <div class="container-fluid" style="padding-top:2em;">
        
        <div class="container">
        <div class="col-12">
            <div class="row row-cards">
    
                        <div class="col-md">
                            <div class="card mb-4 section">
                                <input type="hidden" name="id" value="results1[0].id" />
                                <div class="card-header">
                                    <h3 class="card-title">Banner</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Background Image</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="bannerbackgroundimage" value="<%= results1[0].bannerbackgroundimage %>"   placeholder="">
                                            <small class="form-hint">Enter the file path for the image you want to use as the background.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Logo Image</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="bannerlogoimage" value="<%= results1[0].bannerlogoimage %>"  placeholder="">
                                            <small class="form-hint">Enter the file path for the logo image on the banner.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Banner Text</label>
                                        <div class="col">
                                            <textarea type="text" class="form-control" name="bannertext"  rows="6" placeholder="Banner text..."><%= results1[0].bannertext %></textarea>
    
                                            <small class="form-hint">The text which appears under the logo image on the banner.</small>
                                        </div>
                                    </div>
    
    
                                </div>
                            </div>
                            <div class="card mb-4 section">
    
                                <div class="card-header">
                                    <h3 class="card-title">Section One</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Title</label>
                                        <div class="col">
                                        <input type="text" name="sectionone_title" value="<%= results1[0].sectionone_title %>"  class="form-control"  placeholder="">
                                        </div>
                                    </div>
    
                                    <div class="mb-4 row">
                                        <label class="col-3 col-form-label required">Subtext</label>
                                        <div class="col">
                                        <textarea type="text" class="form-control" name="sectionone_subtitle" rows="6" ><%= results1[0].sectionone_subtitle %></textarea>
    
                                        </div>
                                    </div>
                                        

<% var boxCount = 1 %>
<div class="mb-3 row">
    <% results2.forEach(function(r) { %>

            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <div class="subheader" style="font-size:.75rem;">Box <%= boxCount %></div>
                            <input type="hidden" name="boxitem_id_<%= r.id %>" value="<%= r.id %>" />
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Heading Text</label>
                            <input type="text" name="boxitem_title_<%= r.id %>" value="<%= r.title %>" class="form-control" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subtext</label>
                            <textarea type="text" name="boxitem_subtitle_<%= r.id %>" class="form-control" rows="4"><%= r.subtitle %></textarea>
                        </div>
                    </div>
                </div>
            </div>

           <% boxCount++; %>

    <% }); %>






                                    </div>
                                </div>
                            </div>
                                    <div class="card mb-4 section">
    
                                <div class="card-header">
                                    <h3 class="card-title">Section Two</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Title</label>
                                        <div class="col">
                                            <input type="text" name="sectiontwo_title" value="<%= results1[0].sectiontwo_title %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the text to display for the seciton title.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Text</label>
                                        <div class="col">
                                            <textarea class="form-control" type="text" name="sectiontwo_subtitle" rows="6" placeholder=""><%= results1[0].sectiontwo_subtitle %></textarea>
    
                                            <small class="form-hint">Enter the main text for the section.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Image</label>
                                        <div class="col">
                                            <input type="text" name="sectiontwo_image" value="<%= results1[0].sectiontwo_image %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the file path for the image you want to use in this section</small>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                                    <div class="card mb-4 section">
    
                                <div class="card-header">
                                    <h3 class="card-title">Section 3</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Title</label>
                                        <div class="col">
                                            <input type="text" name="sectionthree_title" value="<%= results1[0].sectionthree_title %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the text to display for the seciton title.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Text</label>
                                        <div class="col">
                                            <textarea class="form-control" type="text" name="sectionthree_subtitle" rows="6" placeholder=""><%= results1[0].sectionthree_subtitle %></textarea>
    
                                            <small class="form-hint">Enter the main text for the section.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Image</label>
                                        <div class="col">
                                            <input type="text" name="sectionthree_image" value="<%= results1[0].sectionthree_image %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the file path for the image you want to use in this section</small>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                                <div class="card mb-4 section">
    
                                <div class="card-header">
                                    <h3 class="card-title">Section 4</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Title</label>
                                        <div class="col">
                                            <input type="text" name="sectionfour_title" value="<%= results1[0].sectionfour_title %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the text to display for the seciton title.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Text</label>
                                        <div class="col">
                                            <textarea class="form-control" type="text" name="sectionfour_subtitle" rows="6" placeholder=""><%= results1[0].sectionfour_subtitle %></textarea>
    
                                            <small class="form-hint">Enter the main text for the section.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Image</label>
                                        <div class="col">
                                            <input type="text" name="sectionfour_image" value="<%= results1[0].sectionfour_image %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the file path for the image you want to use in this section</small>
                                        </div>
                                    </div>
    
                                </div>
                            </div>
    
                                    <div class="card mb-4 section">
    
                                <div class="card-header">
                                    <h3 class="card-title">Section Five</h3>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Title</label>
                                        <div class="col">
                                            <input type="text" name="sectionfive_title" value="<%= results1[0].sectionfive_title %>" class="form-control"  placeholder="">
                                            <small class="form-hint">Enter the text to display for the seciton title.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-3 col-form-label required">Section Text</label>
                                        <div class="col">
                                            <textarea class="form-control" type="text" name="sectionfive_subtitle" rows="6" placeholder=""><%= results1[0].sectionfive_subtitle %></textarea>
    
                                            <small class="form-hint">Enter the main text for the section.</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">

                                        

                                        <% var slideCount = 1 %>
                                        <% results3.forEach(function(r) { %>
                                        
                                            <div class="col-sm-6 col-lg-3" style="padding-bottom:1.5em;">
                                                <div class="card">
                                                    <div class="card-header">
                                                        
                                                        <div class="subheader" style="font-size:.75rem;"> Gallery Image <%= slideCount %> </div>
                                                        <div class="card-actions">
                                                            <% var isActive = r.active == 1 ? "checked" : ""; %>
                                                            <label class="form-check form-switch m-0">
                                                                <input name="galleryimage_active_<%= r.id %>" class="form-check-input position-static" type="checkbox" <%= isActive %> />
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="mb-3">
                                                            <label class="form-label">Heading Text</label>
                                                            <input type="text" name="galleryimage_title_<%= r.id %>" value="<%= r.title %>" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Subtext</label>
                                                            <textarea type="text" name="galleryimage_subtitle_<%= r.id %>" class="form-control" rows="4"><%= r.subtitle %></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Thumbnail Image</label>
                                                            <input type="text" name="galleryimage_thumbimage_<%= r.id %>" value="<%= r.thumbimage %>" class="form-control" placeholder="">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Main Image</label>
                                                            <input type="text" name="galleryimage_mainimage_<%= r.id %>" value="<%= r.mainimage %>" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <% slideCount++; %>
    
                                        <% }); %>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            
        </div>
    </div>
    
    </div>
    
    </form>

    <script src="../../public/assets/dist/libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="../../public/assets/dist/js/tabler.min.js"></script>
    <script src="../../public/assets/dist/libs/tom-select/dist/js/tom-select.complete.min.js"></script>

</body>
</html>



