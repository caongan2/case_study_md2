<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add product</h1>
                        </div>
                        <form method="post" class="user" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <select class="form-control" name="id_product" id="">
                                        <?php foreach ($products as $product): ?>
                                            <option value="<?php echo $product->id ?>"><?php echo $product->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="quantity" placeholder="Quantity" value=""
                                           class="form-control" id="exampleLastName">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="number" hidden name="orderNumber" value="<?php echo $_REQUEST['id'] ?>"
                                       class="form-control" id="exampleFirstName"
                                       placeholder="Order Number">
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
