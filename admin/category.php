              

<?php
include("partial/header.php");
include("partial/nav.php");

?>


    <div class="page-header">
                    <h3 class="page-title">
                        <span class="page-title-icon bg-gradient-primary text-white me-2">
                            <i class="mdi mdi-home"></i>
                        </span> <strong>Category</strong>
                    </h3>
                </div>
                <hr>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Category
                </button>

                <!-- Modal -->
                <div>
                    <div class="table-responsive mt-4">
                    <table id="example" class="table table-striped dt-responsive nowrap" style="width:100%">
                            <thead class="table-primary">
                          
                            <tr>
                                <th>Id</th>
                                <th>Category_name</th>
                                
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider">

                                <?php
                                
                              
                                
                                $row= json_decode($category = $category->readAll(), true);
                                foreach ($row as $res) {
                                    echo "<tr class='table-danger'>";
                                    echo"<td scope='row'>" . $res['id'] . "</td>";
                                    echo"<td>" . $res['categoryName'] . "</td>";
                                    echo "<td>";
                                    if($res['status']==1){
                                        echo "Active";
                                    } 
                                    else
                                    {
                                        echo "No";
                                    };
                                    echo "</td>";
                                  //  echo "<td><input type='submit'id='doc_edit' name='doc_delete' value='Adddress' class='btn btn-success btn-sm'></td>";
                                    echo "<td><input type='submit'id='doc_edit' name='doc_delete' value='Edit' class='btn btn-success btn-sm'></td>";
                                    echo "<td><input type='submit'id='doc_delete' name='doc_delete' value='Delete' class='btn btn-danger btn-sm'></td>";

                                    echo "</tr>";
                                    echo '</form>';
                                }
                                ?>
                            </tbody>
                         
                        </table>
                    </div>





                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Category</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="code.php" method="post" class='frm'>
                                    <div class="mb-3">
                                        <label for="cat_name" class="form-label">Name</label>
                                        <input type=text class="form-control" name="cat_name" id="cat_name">
                                    </div>
                                <div class="mb-3">
                                 <label for="status" class="form-label">Status</label>
                                    <select id="status" class="form-select"  name="status">
                                    <option value="active">active</option>
                                <option value="No">NO</option>

                                </select>
                            </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" value="Add_Category" id='add_cat' name='add_cat'>Add_Category</button>
                            </div> </form>
                        </div>
                    </div>


<?PHP
include_once("partial/footer.php");
?>