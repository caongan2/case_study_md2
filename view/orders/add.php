

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add new ĐƠN HÀNG</h1>
                        </div>
                        <form method="post" class="user" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="time" name="checkin" class="form-control" id="exampleFirstName"
                                           placeholder="Order Date">
                                </div>
                                <div class="col-sm-6">
                                    <input type="time" name="checkout" class="form-control" id="exampleLastName"
                                           placeholder="Check in">
                                </div>
                            </div>
                            <?php foreach ($tables as $table): ?>
                            <div class="form-group">
                                <input type="number" name="id_table" value="<?php echo $table->id_table?>" class="form-control" id="exampleLastName">
                            </div>
                            <?php endforeach;?>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select name="status"   id="" class="form-control">
                                        <option value="unpaid">Unpaid</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="date" name="orderDate" class="form-control"
                                           id="exampleRepeatPassword" placeholder="Order Date">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success btn-user btn-block" value="Accept">
                            <a href="" class="btn btn-primary btn-user btn-block">Cancel</a>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
