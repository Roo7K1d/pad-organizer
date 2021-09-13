<?php
                                    $db = new SQLite3("db.sqlite3");
                                    
                                    $results = $db->query("SELECT * FROM ports");
                                    
                                    while ($row = $results->fetchArray()) {
                                    
                                    
                                       echo '
                                       <tr>
                                    <td class="font-weight-bold">' . htmlspecialchars($row["port"]) .'</td>
                                    <td>';
                                    if ($row["status"] == "Open") {
                                       echo '<a href="#" class="btn btn-success btn-sm btn-icon-split disabled">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-check"></i>
                                       </span>
                                       <span class="text">' . htmlspecialchars($row["status"]) .'</span>
                                       </a>';
                                    } else {
                                       echo '<a href="#" class="btn btn-danger btn-sm btn-icon-split disabled">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-times"></i>
                                       </span>
                                       <span class="text">' . htmlspecialchars($row["status"]) .'</span>
                                       </a>';
                                    } 
                                    echo '
                                       </td>
                                    <td class="font-weight-bold">' . htmlspecialchars($row["service"]) .'</td>
                                    <td class="font-weight-bold">' . htmlspecialchars($row["devicename"]) .'</td>
                                    <td><a href="http://' . htmlspecialchars($row["deviceip"]) .'" target="_blank" class="font-weight-bold">' . htmlspecialchars($row["deviceip"]) .'</a></td>
                                    <td><a href="https://' . htmlspecialchars($row["domain"]) .'" target="_blank" class="font-weight-bold">' . htmlspecialchars($row["domain"]) .'</a></td>
                                    <td><a href="' . htmlspecialchars($row["domainproviderlink"]) .'" target="_blank" class="font-weight-bold">' . htmlspecialchars($row["domanprovider"]) .'</a></td>
                                    <td><a href="http://' . htmlspecialchars($row["deviceip"]) . ':' . htmlspecialchars($row["port"]) . '" target="_blank" class="btn btn-info btn-sm btn-icon-split  font-weight-bold">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-search"></i>
                                       </span>
                                       <span class="text">Visit Port in Browser</span>
                                       </a>
                                       <a href="#" class="btn btn-warning btn-sm btn-icon-split" data-toggle="modal" data-target="#editModal-' . htmlspecialchars($row["id"]) . '">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-eraser"></i>
                                       </span>
                                       <span class="text">Edit</span>
                                       </a>
                                       <form class="vanilla" action="actions/deleteEntry.php" method="post">
                                       <button type="submit" class="btn btn-danger btn-sm btn-icon-split" id="id" name="id" value="' . htmlspecialchars($row["id"]) . '">
                                       <span class="icon text-white-50">
                                       <i class="fas fa-trash"></i>
                                       </span>
                                       <span class="text">Delete</span>
                                       </button>
                                       </form>
                                       <form class="vanilla" action="actions/copyEntry.php" method="post">
                                       <button class="btn btn-primary btn-sm btn-icon-split" id="id" name="id" value=' . htmlspecialchars($row["id"]) . '>
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