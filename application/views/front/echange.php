<div class="page-header no-gutters has-tab">
                        <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                            <div class="media align-items-center m-b-15">
                                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                    <img src="<?php bu('assets/images/'.$objet['photos'][0])?>" alt="">
                                </div>
                                <div class="m-l-15">
                                    <h4 class="m-b-0"><?php echo $objet['titre']?> <span style="color:red;font-size:smaller"><?php echo $nono?></span></h4>
                                    <p class="text-muted m-b-0">Code: #<?php echo $objet['id']?></p>
                                </div>
                            </div>
                            <div class="m-b-15">
                                
                            </div>
                        </div>
                        <ul class="nav nav-tabs" >
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#product-overview">Overview</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#product-images">Product Images</a>
                            </li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="tab-content m-t-15">
                            <div class="tab-pane fade show active" id="product-overview" >
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Basic Info</h4>
                                        <div class="table-responsive">
                                            <table class="product-info-table m-t-20">
                                                <tbody>
                                                    <tr>
                                                        <td>Price:</td>
                                                        <td class="text-dark font-weight-semibold">Ar<?php echo $objet['prix_estimatif']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category:</td>
                                                        <td>    <?php echo $objet['category']?></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Option Info</h4>
                                        <div class="table-responsive">
                                            <table class="product-info-table m-t-20">
                                                <tbody>
                                                <tr>
                                                        <td>Owner:</td>
                                                        <td class="text-dark font-weight-semibold"><?php echo $objet['owner']?></td>
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Product Description</h4>
                                    </div>
                                    <div class="card-body">
                                        <p><?php echo $objet['description']?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-images">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php 
                                            for ($i=0; $i < count($objet['photos']); $i++) { 
                                                ?>
                                                <div class="col-md-3">
                                                <img class="img-fluid" src="<?php bu('assets/images/'.$objet['photos'][$i])?>" alt="">
                                            </div>
                                                <?php
                                            }
                                            
                                            ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-lg-8">
                                    <div class="d-md-flex">
                                        <div class="m-b-10 m-r-15">
                                            <p>Echanger contre :</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <form action="<?php su('frontechange/echanger')?>" method="get">
                                        <input type="hidden" name="idobjet" value="<?php echo $objet['id']?>">
                                    <button class="btn btn-primary" type="submit">
                                        <span>Echanger</span>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover e-commerce-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="checkbox">
                                                    <input id="checkAll" type="checkbox">
                                                    <label for="checkAll" class="m-b-0"></label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for ($i=0; $i < count($list); $i++) { 
                                            ?>
                                            <tr>
                                            <td>
                                                <div class="checkbox">
                                                <input id="radio1" name="<?php echo $list[$i]['id']?>" type="radio">
                                                <label for="radio1"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?php su('front/details_objet?idobjet='.$list[$i]['id'])?>">#<?php echo $list[$i]['id']?></a>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="assets/images/others/thumb-9.jpg" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $list[$i]['titre']?></h6>
                                                </div>
                                            </td>
                                            <td><?php echo $list[$i]['category']?></td>
                                            <td>Ar<?php echo $list[$i]['prix_estimatif']?></td>
                                            <td class="text-right">
                                                
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>