<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <title>Projet S5 S3</title>
     <!-- plugins:css -->
     <link rel="stylesheet" href="<%= request.getContextPath() %>/assets/vendors/mdi/css/materialdesignicons.min.css">
     <link rel="stylesheet" href="<%= request.getContextPath() %>/assets/vendors/css/vendor.bundle.base.css">
     <!-- endinject -->
     <!-- Plugin css for this page -->
     <!-- End plugin css for this page -->
     <!-- inject:css -->
     <!-- endinject -->
     <!-- Layout styles -->
     <link rel="stylesheet" href="<%= request.getContextPath() %>/assets/css/style.css">
     <!-- End layout styles -->
     <link rel="shortcut icon" href="<%= request.getContextPath() %>/assets/images/favicon.ico" />
</head>

<body>
     <div class="container-scroller">

          <!-- partial:partials/_navbar.html -->
          <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
               <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="<%= request.getContextPath() %>/assets/images/logo.svg"
                              alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<%= request.getContextPath() %>/assets/images/logo-mini.svg"
                              alt="logo" /></a>
               </div>
               <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                         data-toggle="minimize">
                         <span class="mdi mdi-menu"></span>
                    </button>
                    <div class="search-field d-none d-md-block">
                         <form class="d-flex align-items-center h-100" action="#">
                              <div class="input-group">
                                   <div class="input-group-prepend bg-transparent">
                                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                                   </div>
                                   <input type="text" class="form-control bg-transparent border-0"
                                        placeholder="Search projects">
                              </div>
                         </form>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                         data-toggle="offcanvas">
                         <span class="mdi mdi-menu"></span>
                    </button>
               </div>
          </nav>
          <div class="container-fluid page-body-wrapper">

               <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                         <li class="nav-item nav-profile">
                              <a href="#" class="nav-link">

                                   <div class="nav-profile-text d-flex flex-column">
                                        <span class="font-weight-bold mb-2">Directeur</span>
                                        <span class="text-secondary text-small">Project Manager</span>
                                   </div>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic_service" aria-expanded="false" aria-controls="ui-basic_service">
                                   <span class="menu-title">Liste</span>
                                   <i class="menu-arrow"></i>
                              </a>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/get_list_activite">Liste Actvit�s</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/check_voyage">Liste activites voyage</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/prix.jsp">prix</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/ListeReservation">Liste reservations</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/liste_stock">Liste stock</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/liste_controller">Liste voyage</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/benefice.jsp">Benefice</a></li>
                                   </ul>
                              </div>
                              
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/ListeStatus">Liste Status</a></li>
                                   </ul>
                              </div>
                                   
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/ouvrier_type">Attribut</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_service">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/ListePersonnelController">Liste Personnel</a></li>
                                   </ul>
                              </div>
                              
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic_produit" aria-expanded="false" aria-controls="ui-basic_produit">
                                   <span class="menu-title">Ajout</span>
                                   <i class="menu-arrow"></i>
                              </a>
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                       <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/bouquet.jsp">Ajout bouquet</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/activite.jsp">Ajout active</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/create_bouquetActivite">Ajout bouquet et Activite</a></li>
                                   </ul>
                              </div>
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/Lieu.jsp">Ajout lieu</a></li>
                                   </ul>
                              </div> 
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/typeVoyage.jsp">Ajout type</a></li>
                                   </ul>
                              </div> 
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/create_voyage">Ajout voyage</a></li>
                                   </ul>
                              </div> 
                               <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/StockController">Ajout stock</a></li>
                                   </ul>
                              </div> 
                                   <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/ReservationController">Ajout Reservation</a></li>
                                   </ul>
                              </div> 
                                        <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/fonction.jsp">Ajout Fonction</a></li>
                                   </ul>
                              </div> 
                                    <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/OuvrierController">Ajout Ouvrier</a></li>
                                   </ul>
                              </div> 
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/VenteController">Ajout vente</a></li>
                                   </ul>
                              </div> 
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/AjoutFonction">Ajout voyage fonction</a></li>
                                   </ul>
                              </div> 
                              
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/PersonnelController">Personnel</a></li>
                                   </ul>
                              </div> 
                              
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/pages/ajout/status.jsp">Status</a></li>
                                   </ul>
                              </div> 
                              <div class="collapse" id="ui-basic_produit">
                                   <ul class="nav flex-column sub-menu">
                                   <li class="nav-item"> <a class="nav-link" href="<%= request.getContextPath() %>/DifferenceController">Difference</a></li>
                                   </ul>
                              </div> 
                         </li>
                    </ul>
               </nav>
               <div class="main-panel container">

               <%
                    //out.println("message");
                    if(request.getAttribute("erreur")!=null){
                    %>
                    <div class="alert alert-danger" role="alert">
                         <%=request.getAttribute("erreur")%>
                    </div>
               <% }
               %>
                
               <%  
                    if(request.getAttribute("message")!=null){
                    %>
                    <div class="alert alert-success" role="alert">
                         <%=request.getAttribute("message")%>
                    </div>
               <% }
               %>
                    <div class="content-wrapper">
                      <div class="page-header">
                         <h3 class="page-title">Voyage organis�</h3>
                              <nav aria-label="breadcrumb">
                                   <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Voayage</a></li>
                                   <li class="breadcrumb-item active" aria-current="page">Voyage organis�</li>
                                   </ol>
                              </nav>
                         </div>
                    