<?php
         $db = new SQLite3("db.sqlite3");
         
         $results = $db->query("SELECT * FROM ports");
         
         while ($row = $results->fetchArray()) {
         
            echo'
         
         <div class="modal fade" id="editModal-' . htmlspecialchars($row['id']) . '" tabindex="-1" role="dialog" aria-labelledby="editLabel"
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
         <input type="text" class="form-control" id="inputPort" name="inputPort" placeholder="80" value="' . htmlspecialchars($row["port"]) . '" required>
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
         <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Apache2 Webserver" value="' . htmlspecialchars($row["service"]) . '" required>
         </div>
         <div class="mb-3">
         <label for="inputIP" class="form-label font-weight-bold">Device IP</label>
         <input type="text" class="form-control" id="inputIP" name="inputIP" placeholder="192.168.13.37" value="' . htmlspecialchars($row["deviceip"]) . '" required>
         </div>
         <div class="mb-3">
         <label for="inputDevice" class="form-label font-weight-bold">Device Name</label>
         <input type="text" class="form-control" id="inputDevice" name="inputDevice" placeholder="Root Server" value="' . htmlspecialchars($row["devicename"]) . '" required>
         </div>
         <div class="mb-3">
         <label for="inputDomain" class="form-label font-weight-bold">Domain</label>
         <input type="text" class="form-control" id="inputDomain" name="inputDomain" placeholder="example.com" value="' . htmlspecialchars($row["domain"]) . '" required>
         </div>
         <div class="mb-3">
         <label for="inputProvider" class="form-label font-weight-bold">Domain Provider</label>
         <input type="text" class="form-control" id="inputProvider" name="inputProvider" placeholder="GoDaddy" value="' . htmlspecialchars($row["domanprovider"]) . '" required>
         </div>
         <div class="mb-3">
         <label for="inputProviderLink" class="form-label font-weight-bold">Domain Provider Link</label>
         <input type="text" class="form-control" id="inputProviderLink" name="inputProviderLink" placeholder="https://godaddy.com" value="' . htmlspecialchars($row["domainproviderlink"]) . '" required>
         </div>
         </div>
         <div class="modal-footer">
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <button type="submit" class="btn btn-success" id="id" name="id" value="' . htmlspecialchars($row["id"]) . '">Edit</button>
         </div>
         </form>
         </div>
         </div>
         </div>
         </div>
         ';
         
         }
         ?>