<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>PaD Organizer</title>
      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/sb-admin-2.min.css" rel="stylesheet">
      <!-- Custom styles for this page -->
      <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   </head>
   <style>
      .vanilla {
      all: unset;
      }
   </style>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- Begin Page Content -->
               <div class="container-fluid col col-lg-10">
                  <!-- Page Heading -->
                  <br>
                  <h1 class="h1 mb-2 text-gray-800">RootK1d's Port and Domain Organizer</h1>
                  <p class="mb-4">If you're like me, you often forget which ports you forwarded in your router for which project and which domain belongs to which device. I made this little website to help me remember which app uses which ports and whether or not I have open ports for new projects left.</p>
                  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                     </div>
                     <div class="card-body">
                        <a href="#" class="btn btn-success btn-sm btn-icon-split" data-toggle="modal" data-target="#addModal">
                        <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Add New Item To List</span>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm btn-icon-split" data-toggle="modal" data-target="#resetModal">
                        <span class="icon text-white-50">
                        <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Reset List</span>
                        </a>
                     </div>
                  </div>
                  <!-- DataTales Example -->
                  <div class="card shadow mb-4">
                     <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List</h6>
                     </div>
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
                                 <tr>
                                    <th>Port</th>
                                    <th>Port Status</th>
                                    <th>Service / App Name</th>
                                    <th>Device Name</th>
                                    <th>Device IP</th>
                                    <th>Device Domain</th>
                                    <th>Domain Provider</th>
                                    <th>Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $db = new SQLite3("db.sqlite3");
                                    
                                    $results = $db->query("SELECT * FROM ports");
                                    
                                    while ($row = $results->fetchArray()) {
                                    
                                    
                                       echo '
                                       <tr>
                                    <td class="font-weight-bold">' . $row["port"] .'</td>
                                    <td>';
                                    if ($row["status"] == "Open") {
                                       echo '<a href="#" class="btn btn-success btn-sm btn-icon-split disabled">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-check"></i>
                                       </span>
                                       <span class="text">' . $row["status"] .'</span>
                                       </a>';
                                    } else {
                                       echo '<a href="#" class="btn btn-danger btn-sm btn-icon-split disabled">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-times"></i>
                                       </span>
                                       <span class="text">' . $row["status"] .'</span>
                                       </a>';
                                    } 
                                    echo '
                                       </td>
                                    <td class="font-weight-bold">' . $row["service"] .'</td>
                                    <td class="font-weight-bold">' . $row["devicename"] .'</td>
                                    <td><a href="http://' . $row["deviceip"] .'" target="_blank" class="font-weight-bold">' . $row["deviceip"] .'</a></td>
                                    <td><a href="https://' . $row["domain"] .'" target="_blank" class="font-weight-bold">' . $row["domain"] .'</a></td>
                                    <td><a href="' . $row["domainproviderlink"] .'" target="_blank" class="font-weight-bold">' . $row["domanprovider"] .'</a></td>
                                    <td><a href="http://' . $row["deviceip"] . ':' . $row["port"] . '" target="_blank" class="btn btn-info btn-sm btn-icon-split  font-weight-bold">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-search"></i>
                                       </span>
                                       <span class="text">Visit Port in Browser</span>
                                       </a>
                                       <a href="#" class="btn btn-warning btn-sm btn-icon-split" data-toggle="modal" data-target="#editModal-' . $row["id"] . '">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-eraser"></i>
                                       </span>
                                       <span class="text">Edit</span>
                                       </a>
                                       <form class="vanilla" action="actions/deleteEntry.php" method="post">
                                       <button type="submit" class="btn btn-danger btn-sm btn-icon-split" id="id" name="id" value="' . $row["id"] . '">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-trash"></i>
                                       </span>
                                       <span class="text">Delete</span>
                                       </button>
                                       </form>
                                       <form class="vanilla" action="actions/copyEntry.php" method="post">
                                       <button class="btn btn-primary btn-sm btn-icon-split" id="id" name="id" value=' . $row["id"] . '>
                                       <span class="icon text-white-50">
                                       <i class="fas fa-copy"></i>
                                       </span>
                                       <span class="text">Copy</span>
                                       </button>
                                       </form>
                                    </td>
                                    </tr>
                                    ';
                                    
                                    }
                                    
                                    ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Made with <i class="fas fa-heart fa-sm text-danger"></i> by <a target="_blank"
                        href="https://github.com/Roo7K1d">RootK1d</a> &copy; <?php echo date("Y"); ?></span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a Port</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  Please make sure that the entry you want to add isn't already in the list.
                  <br>
                  <form action="actions/addEntry.php" method="post">
                     <div class="mb-3">
                        <label for="inputPort" class="form-label font-weight-bold">Port</label>
                        <input type="text" class="form-control" id="inputPort" name="inputPort" placeholder="80" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputStatus" class="form-label font-weight-bold">Status</label>
                        <select class="form-control" id="inputStatus" name="inputStatus" required>
                           <option>Open</option>
                           <option>Closed</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label for="inputName" class="form-label font-weight-bold">Service / App Name</label>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Apache2 Webserver" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputIP" class="form-label font-weight-bold">Device IP</label>
                        <input type="text" class="form-control" id="inputIP" name="inputIP" placeholder="192.168.13.37" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputDevice" class="form-label font-weight-bold">Device Name</label>
                        <input type="text" class="form-control" id="inputDevice" name="inputDevice" placeholder="Root Server" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputDomain" class="form-label font-weight-bold">Domain</label>
                        <input type="text" class="form-control" id="inputDomain" name="inputDomain" placeholder="example.com" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputProvider" class="form-label font-weight-bold">Domain Provider</label>
                        <input type="text" class="form-control" id="inputProvider" name="inputProvider" placeholder="GoDaddy" required>
                     </div>
                     <div class="mb-3">
                        <label for="inputProviderLink" class="form-label font-weight-bold">Domain Provider Link</label>
                        <input type="text" class="form-control" id="inputProviderLink" name="inputProviderLink" placeholder="https://godaddy.com" required>
                     </div>
               </div>
               <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-success">Submit</button>
               </div>
               </form>
            </div>
         </div>
      </div>
      </div>
      <?php
         $db = new SQLite3("db.sqlite3");
         
         $results = $db->query("SELECT * FROM ports");
         
         while ($row = $results->fetchArray()) {
         
            echo'
         
         <div class="modal fade" id="editModal-' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="editLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
         <div class="modal-header">
         <h5 class="modal-title" id="editLabel">Edit An Entry</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         </div>
         <div class="modal-body">
         <br>
         <form action="actions/editEntry.php" method="post">
         <div class="mb-3">
         <label for="inputPort" class="form-label font-weight-bold">Port</label>
         <input type="text" class="form-control" id="inputPort" name="inputPort" placeholder="80" value="' . $row["port"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputStatus" class="form-label font-weight-bold">Status</label>
         <select class="form-control" id="inputStatus" name="inputStatus" required>
         ';
         if ($row["status"] == "Open") {
            echo '<option selected="selected">Open</option>
                  <option>Closed</option>
            ';
         } else {
            echo '<option>Open</option>
                  <option selected="selected">Closed</option>
            ';
         }
         echo '
         </select>
         </div>
         <div class="mb-3">
         <label for="inputName" class="form-label font-weight-bold">Service / App Name</label>
         <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Apache2 Webserver" value="' . $row["service"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputIP" class="form-label font-weight-bold">Device IP</label>
         <input type="text" class="form-control" id="inputIP" name="inputIP" placeholder="192.168.13.37" value="' . $row["deviceip"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputDevice" class="form-label font-weight-bold">Device Name</label>
         <input type="text" class="form-control" id="inputDevice" name="inputDevice" placeholder="Root Server" value="' . $row["devicename"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputDomain" class="form-label font-weight-bold">Domain</label>
         <input type="text" class="form-control" id="inputDomain" name="inputDomain" placeholder="example.com" value="' . $row["domain"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputProvider" class="form-label font-weight-bold">Domain Provider</label>
         <input type="text" class="form-control" id="inputProvider" name="inputProvider" placeholder="GoDaddy" value="' . $row["domanprovider"] . '" required>
         </div>
         <div class="mb-3">
         <label for="inputProviderLink" class="form-label font-weight-bold">Domain Provider Link</label>
         <input type="text" class="form-control" id="inputProviderLink" name="inputProviderLink" placeholder="https://godaddy.com" value="' . $row["domainproviderlink"] . '" required>
         </div>
         </div>
         <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-success" id="id" name="id" value="' . $row["id"] . '">Edit</button>
         </div>
         </form>
         </div>
         </div>
         </div>
         </div>
         ';
         
         }
         ?>
      <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Reset List</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">
                  Are you sure you want to delete all the data that is in your port list?
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <form action="actions/resetList.php" method="post">
                     <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      </div>

      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="vendor/datatables/jquery.dataTables.min.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="js/demo/datatables-demo.js"></script>
   </body>
</html>