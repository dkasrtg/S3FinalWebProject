<div class="page-header no-gutters has-tab">
                        <div class="d-md-flex m-b-15 align-items-center justify-content-between">
                            <div class="media align-items-center m-b-15">
                                <div class="avatar avatar-image rounded" style="height: 70px; width: 70px">
                                    <img src="<?php bu('assets/images/'.$objet['photos'][0])?>" alt="">
                                </div>
                                <div class="m-l-15">
                                    <h4 class="m-b-0"><?php echo $objet['titre']?></h4>
                                    <p class="text-muted m-b-0">Code: #<?php echo $objet['id']?></p>
                                </div>
                            </div>
                            <div class="m-b-15">
                                <button class="btn btn-primary">
                                    <i class="anticon anticon-edit"></i>
                                    <span><a style="color: white;" href="<?php su('front/objet_update?idobjet='.$objet['id'])?>">Edit</a></span>
                                </button>
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