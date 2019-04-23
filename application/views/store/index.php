
          <section class="py-5">
            <div class="row">
              <?php if ($_SESSION['role']  == "3"|| $_SESSION['role']  == "5") { ?>
              <div class="col-lg-5  mb-4 mb-lg-0 pl-lg-0">
                <div class="card">
                  <div class="card-header">
                    <h2 class="h6 text-uppercase mb-0 ">
                      <span class="fa fa-shopping-cart"></span>
                      Cart
                    </h2>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-sm card-text">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>QTY</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>##</th>
                          </tr>
                        </thead>
                        <tbody id="table-cart">
                          <?php 
                            $no = 1;
                            foreach ($carts as $cart) {?>
                              <tr>
                                <th><?= $no++?></th>
                                <td><?= $cart['id_minuman']?></td>
                                <td><?= $cart['jumlah']?></td>
                                <td><?= $cart['harga']?></td>
                                <td><?= $cart['total_harga']?></td>
                                <td> <a href="<?= base_url('store/del_cart/').$cart['id_keranjang']?>" class="btn btn-sm btn-danger" style="font-size: 8px"><span class="fa fa-trash"></span> </a> </td>
                              </tr>
                            <?php  
                            }

                          ?>
                        </tbody>
                      </table>
                    </div>
                    <hr>
                    <form action="<?= base_url('Store/order')?>" method="post" accept-charset="utf-8" class="form-order">
                      <div class="form-group row">
                          <label for="staticEmail" class="col-sm-3 col-form-label">ID Cust</label>
                          <div class="col">
                            <select class="form-control" name="id_customer">
                                <option value="">--</option>
                                <?php
                                  foreach ($customers as $customer) {?>
                                    <option value="<?= $customer['id_user'] ?>"><?= $customer['id_user']." - ".$customer['username'] ?></option>
                                <?php    
                                  }
                                ?>
                            </select>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Table</label>
                        <div class="col-sm">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend"><span class="input-group-text"></span></div>
                                  <select class="form-control" name="table">
                                    <option value="">--</option>
                                    <?php 
                                      foreach ($tables as $table) {?>
                                        <option value="<?= $table['id_meja'] ?>"><?= $table['id_meja'] ?></option>
                                    <?php    
                                      }
                                    ?>
                                  </select>
                                </div>
                               </div> 
                            </div>
                          </div>
                          
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-3 col-form-label">Subtotals</label>
                        <div class="col">
                          <input id="subtotal" value=" <?php foreach($subtotal as $Total) { echo $Total['total_harga']; } ?>" name="subtotal"class="form-control" readonly="readonly">
                        </div>
                      </div>  
                      <div class="form-group row">
                        <label class="col-3 col-form-label" for="pay">Pay</label>
                        <div class="col">
                          <input id="pay" name="pay" placeholder="100,000" class="form-control" required>
                        </div>
                      </div>
                      <div class="form-group text-center">
                        <button type="button" class="btn btn-danger" id="btn-close-cart">Close</button>
                        <button type="submit" class="btn btn-success" id="btn-save-cart">Save</button>
                      </div>
                    </form>
                    <hr>
                    <div align="right">
                      <a href="<?= base_url('store/clean')?>" class="btn btn-warning" id="btn-clean-cart">Clean Up</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 mb-4 mb-lg-0">
              <?php } ?>
              <?php if ($_SESSION['role']  == "1") { ?>  
                <div class="col-lg-12 mb-4 mb-lg-0">
              <?php } ?>
                <div class="row">
                  <?php if ($_SESSION['role']  == "3"|| $_SESSION['role']  == "5") { ?>  
                  <div class="col-lg-12">
                    <div class="card px-4 py-2  mb-4 no-anchor-style">
                      <div class="row">
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                          <select id="sortBy" class="form-control" onchange="searchFilter()">
                            <option value="">Sort By</option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                          </select>
                        </div>
                        <div class="col-sm text-right"><small></small><label>
                          <input type="text" id="keywords" class="form-control" placeholder="Type name" onkeyup="searchFilter()" />
                        </label></div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="col-lg-12">
                    <div class="row text-dark" id="list-cart" class="list-cart">
                      <?php 
                        foreach ($drinks as $drink) {?>
                          <div class="col-md-4 mb-4 mb-lg-0 mrg" style="margin-bottom: 20px!important">
                            <a class="card rounded credit-card bg-hover-gradient-violet cart" <?php if ($_SESSION['role']  == "3"|| $_SESSION['role']  == "5") { ?>   id="<?= $drink['id_minuman']?>" <?php } ?>style="background-image: url('https://images.pexels.com/photos/982612/pexels-photo-982612.jpeg?cs=srgb&dl=art-beverage-black-982612.jpg&fm=jpg');background-repeat:no-repeat;background-size:cover;cursor: pointer;">
                              <div class="content p-4 ">
                                <strong class="mb-1 p-1 bg-transparent text-monospace text-light text-uppercase text-truncate"><?= $drink['nama_minuman'] ?></strong>
                                <div class="float-right p-1 text-light">
                                  <label> Stock: <?= $drink['stok'] ?><span></span></label>
                                </div>
                                <div class="mb-0 p-1"><span class="badge badge-light"><?= $drink['diskon'] ?>%</span></div>
                                <div class="float-right p-1 mb-0 text-light">
                                  <strong class="text-light text-uppercase"><?= $drink['harga_jual'] ?></strong>
                                </div>
                              </div> 
                            </a>
                          </div>
                      <?php     
                        }
                      ?>
                    </div>
                    <?php if ($_SESSION['role']  == "3"|| $_SESSION['role']  == "5") { ?>
                    <div id="modal-cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                      <div role="document" class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="exampleModalLabel" class="modal-title">Add Cart</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <form action="<?= base_url('store/add_cart')?>" class="form-cart" method="post" accept-charset="utf-8">
                          <div class="modal-body">
                              <div class="form-group">       
                                <input id="input-hidden" name="id" type="hidden" value="" />
                                <input id="input-cart" name="jumlah" type="number" placeholder="0" class="form-control"  />
                              </div>
                          </div>
                          <div class="modal-footer">
                            <input type="submit" class="btn btn-sm btn-secondary" name="submit" value="Add">
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </section>

