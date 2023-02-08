<div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-lg-8">
                                    <div class="d-md-flex">
                                        <div class="m-b-10 m-r-15">
                                            <select class="custom-select" style="min-width: 180px;">
                                                <option selected>Catergory</option>
                                                <option value="all">All</option>
                                                <option value="homeDeco">Home Decoration</option>
                                                <option value="eletronic">Eletronic</option>
                                                <option value="jewellery">Jewellery</option>
                                            </select>
                                        </div>
                                        <div class="m-b-10">
                                            <select class="custom-select" style="min-width: 180px;">
                                                <option selected>Status</option>
                                                <option value="all">All</option>
                                                <option value="inStock">In Stock </option>
                                                <option value="outOfStock">Out of Stock</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    
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
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?php su('front/details_objet2?idobjet='.$list[$i]['id'])?>">#<?php echo $list[$i]['id']?></a>
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
                                                <a href="<?php su('frontechange/index?idobjet='.$list[$i]['id'])?>">Echanger</a>
                                            </td>
                                            <td>
                                                <a href="<?php su('Frontechange/getHisto/'.$list[$i]['id'])?>">Voir Historique</a>
                                            </td>
                                        </tr>
                                            <?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>