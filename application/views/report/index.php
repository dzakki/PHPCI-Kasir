          <section class="py-5">
            <div class="row">
              <div class="col-lg-12 mb-4">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Transaction Data</h6>
                  </div>
                  <div class="card-body">
                    <table class="table card-text">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Cashier ID</th>
                          <th>Customer</th>
                          <th>Table</th>
                          <th>Total</th>
                          <th>Status Pay</th>
                          <th>Status Order</th>
                          <th>Created</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $alert = "'Are you sure?'";
                        foreach ($transactions as $transaction) {?>
                          <tr>
                            <th scope="row"><a href='#' class="get_order" id="<?= $transaction['id_transaksi'] ?>"><?= $transaction['id_transaksi'] ?></a></th>
                            <?php 
                            if ($_SESSION['role'] == "3" || $_SESSION['role'] == "4" || $_SESSION['role'] == "5") {?>
                              <td><?= $transaction['id_kasir'] ?></td>
                            <?php  
                            }else{
                              echo '<td> - </td>';
                            }
                            ?>
                            <td><?= $transaction['username'] ?></td>
                            <td><?= $transaction['id_meja'] ?></td>
                            <td><?= $transaction['total'] ?></td>
                            <td><?php if ( $transaction['bayar'] == "success") {
                              echo '<button class="btn btn-sm btn-success" id="'.$transaction['id_transaksi'].'">Success</button>';
                            }else{
                              if ($_SESSION['role'] == "3" || $_SESSION['role'] == "4" || $_SESSION['role'] == "5") {
                                echo '<a href="'.base_url('store/update_status_pay/').$transaction['id_transaksi'].'" class="btn btn-sm btn-warning" id="'.$transaction['id_transaksi'].'" onclick="confirm('.$alert.')">Pending</a>';
                              }else{
                                echo '<button class="btn btn-sm">pending</button>';
                              }
                            } ?></td>
                            <td><?php if ($transaction['status_order'] == "pending") {
                                if ($_SESSION['role'] == "3"  || $_SESSION['role'] == "5") {
                                  echo '<a href="'.base_url('store/update_status_order/').$transaction['id_transaksi'].'" class="btn btn-sm btn-warning" id="'.$transaction['id_transaksi'].'" onclick="alert('.$alert.')">Pending</a>';
                                }else{
                                  echo '<button class="btn btn-sm btn-warning">pending</button>';
                                }

                            }else{
                              echo '<button class="btn btn-sm btn-success" id="'.$transaction['id_transaksi'].'">Success</button>';
                            } ?></td>
                            <td><?= $transaction['created_at'] ?></td>
                          </tr>
                        <?php  
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div id="modal-order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 id="exampleModalLabel" class="modal-title">List ordered</h4>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <table class="table card-text table-stripped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>QTY</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                            <tbody id="list_order">
                            </tbody>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" class="btn btn-primary">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </section>