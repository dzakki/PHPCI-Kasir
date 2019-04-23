
          <section class="py-5">
            <div class="row">
              <?php if ($_SESSION['role'] == "5") { ?>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Users Data</h6>
                  </div>
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                          <th>Gmail</th>
                          <th>Role</th>
                          <th>Created</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                          foreach ($users as $user) {?>
                            <tr>
                              <th scope="row"><?= $no++?></th>
                              <td><?= $user['first_name']?></td>
                              <td><?= $user['last_name']?></td>
                              <td><?= $user['username']?></td>
                              <td><?= $user['email']?></td>
                              <td><?= $user['role']?></td>
                              <td><?= $user['created_at']?></td>
                              <td> <button class="btn btn-sm btn-secondary btn-edit-user" id="<?= $user['id_user']?>" data-role="<?= $user['role']?>"> <span class="fa fa-edit"></span></button> </td>
                            </tr>
                        <?php  
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Update Level</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form action="<?= base_url('user/update_level') ?>" method="post">
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-3 col-form-label">Level</label>
                            <div class="col">
                              <input type="hidden" name="id" value="">
                              <select class="form-control" name="level">
                                  <option value="1" >1 - Customer</option>
                                  <option value="2" >2 - Chasier</option>
                                  <option value="3" >3 - Waiter</option>
                                  <option value="4" >4 - Admin</option>
                              </select>
                            </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                   </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Drinks Data</h6>
                  </div>
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Price Sell</th>
                          <th>Discount</th>
                          <th>PPN</th>
                          <th>Stok</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1;
                          foreach ($drinks as $drink) {?>
                          <tr>
                            <th scope="row"><?= $no++?></th>
                            <td><?= $drink['nama_minuman'] ?></td>
                            <td><?= $drink['harga_minuman'] ?></td>
                            <td><?= $drink['harga_jual'] ?></td>
                            <td><?= $drink['diskon'] ?>%</td>
                            <td><?= $drink['ppn'] ?></td>
                            <td><?= $drink['stok'] ?></td>
                            <td> <button class="btn btn-sm btn-secondary btn-edit-drink" id="<?=  $drink['id_minuman']?>" data-name="<?= $drink['nama_minuman'] ?>" data-price="<?= $drink['harga_minuman'] ?>" data-discount="<?= $drink['diskon'] ?>" data-stok="<?= $drink['stok'] ?>"> <span class="fa fa-edit"></span></button> </td>
                          </tr>    
                        <?php     
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <button type="button"  class="btn btn-sm btn-secondary btn-add-drink" data-toggle="modal" data-target="#modal-add-drink">Add Drink</button>
                  </div>
                </div>
                <div id="modal-add-drink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Add Drink</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form action="<?= base_url('drink/insert') ?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">       
                            <label for="name">Name</label>
                            <input type="text" name="name" value="" id="name" class="form-control" placeholder="Coffe Black" required="">
                          </div>
                          <div class="form-group row">
                            <div class="col-sm">
                            <label for="price">Price</label><input type="number" name="price" value="" id="price" class="form-control" placeholder="100000" required="">
                            <small class="form-text text-muted ml-3">dont use ( . ) ex: 100000</small>
                            </div>
                            <div class="col-sm">
                            <label for="discount">Discount</label><input type="number" name="discount" value="0" id="discount" class="form-control" placeholder="99" maxlength="10" required="">
                            <small class="form-text text-muted ml-3">Max 100, dont use ( % ) . ex: 99</small>
                            </div>
                            <div class="col-sm">
                            <label for="stok">Stok</label><input type="number" name="stok" value="" id="stok" class="form-control" placeholder="100" required="">
                            </div>
                          </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                   </form>
                    </div>
                  </div>
                </div>
              </div>
              <div id="modal-edit-drink" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Edit Drink</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form action="<?= base_url('drink/update')?>" method="post">
                      <div class="modal-body">
                          <div class="form-group">       
                            <label for="name">Name</label>
                            <input type="hidden" name="id" value="">
                            <input type="text" name="name" value="" id="name" class="form-control" placeholder="Coffe Black" required="">
                          </div>
                          <div class="form-group row">
                            <div class="col-sm">
                            <label for="price">Price</label><input type="number" name="price" value="" id="price" class="form-control" placeholder="100000" required="">
                            <small class="form-text text-muted ml-3">dont use ( . ) ex: 100000</small>
                            </div>
                            <div class="col-sm">
                            <label for="discount">Discount</label><input type="number" name="discount" value="0" id="discount" class="form-control" placeholder="99" maxlength="10" required="">
                            <small class="form-text text-muted ml-3">Max 100, dont use ( % ) . ex: 99</small>
                            </div>
                            <div class="col-sm">
                            <label for="stok">Stok</label><input type="number" name="stok" value="" id="stok" class="form-control" placeholder="100" required="">
                            </div>
                          </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                   </form>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              <div class="col-lg-4 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Tables Data</h6>
                  </div>
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Status</th>
                          <th>Chairs</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no = 1;
                           foreach ($tables as $table) {?>
                            <tr>
                              <th scope="row"><?= $no++?></th>
                              <td><?= $table['status'] ?></td>
                              <td><?= $table['kursi'] ?></td>
                              <td> <button class="btn btn-sm btn-secondary btn-edit-table" id="<?= $table['id_meja']?>" data-status="<?= $table['status'] ?>" data-chair="<?= $table['kursi']?>"> <span class="fa fa-edit"></span></button> </td>
                            </tr>

                        <?php                          
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-sm btn-secondary"  data-toggle="modal" data-target="#modal-add-table" >Add Table</button>
                  </div>
                </div>
                <div id="modal-add-table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Add Table</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form action="<?= base_url('table/insert')?>" method="post">
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-3 col-form-label">Status</label>
                            <div class="col">
                              <input type="hidden" name="id" value="">
                              <select class="form-control" name="status">
                                  <option value="empty" >Empty</option>
                                  <option value="exist" >Exist</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">       
                            <label for="chair">Chair</label>
                            <input type="number" name="chair" id="chair" class="form-control" placeholder="2" required="" maxlength="1">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                   </form>
                    </div>
                  </div>
                </div>
                <div id="modal-edit-table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                  <div role="document" class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 id="exampleModalLabel" class="modal-title">Edit Table</h4>
                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                      </div>
                      <form action="<?= base_url('table/update') ?>" method="post">
                      <div class="modal-body">
                        <div class="form-group row">
                          <label for="staticEmail" class="col-sm-3 col-form-label">Status</label>
                            <div class="col">
                              <input type="hidden" name="id" value="">
                              <select class="form-control" name="status">
                                  <option value="empty" >Empty</option>
                                  <option value="exist" >Exist</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">       
                            <label for="chair">Chair</label>
                            <input type="number" name="chair" id="chair" class="form-control" placeholder="2" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                   </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php if ($_SESSION['role'] == "5") { ?>
              <div class="col-lg-8 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Customers Data</h6>
                  </div>
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Gender</th>
                          <th>Option</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no =1;
                          foreach ($customers as $customer) {?>
                            <tr>
                              <th scope="row"><?= $no++?></th>
                              <td><?= $customer['first_name']." ".$customer['last_name'] ?></td>
                              <td><?= $customer['username'] ?></td>
                              <td><?= $customer['gender'] ?></td>
                              <td> <button class="btn btn-sm btn-secondary btn-edit-user" id="<?= $customer['id_user']?>"> <span class="fa fa-edit"></span></button> </td>
                            </tr>
                        <?php    
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            <?php } ?>

            </div>
          </section>