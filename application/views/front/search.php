<div class="card">
                        <div class="card-body">
                            <h4>Search here</h4>
                            
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('frontsearch/index')?>" method="get">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputCity">Mot cle</label>
                                            <input type="text" name="txt" class="form-control" id="inputCity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">Categorie</label>
                                            <select id="inputState" name="cat" class="form-control">
                                                <option value="0">All</option>
                                                <?php 
                                                for ($i=0; $i < count($category); $i++) { 
                                                    ?>
                                                    <option value="<?php echo $category[$i]['id']?>"><?php echo $category[$i]['name']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                       
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </form>
</div>
                        </div>
                    </div>
<div class="card">
                        <div class="card-body">
                            <div class="row m-b-30">
                                <div class="col-lg-8">
                                    <div class="d-md-flex">
                                        <div class="m-b-10 m-r-15">
                                            Mot-Cle: <?php echo $mot?>
                                        </div>
                                        <div class="m-b-10">
                                            Categorie:  <?php echo $cat?>
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
                                                <a href="<?php su('front/details_objet1?idobjet='.$list[$i]['id'])?>">#<?php echo $list[$i]['id']?></a>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$list[$i]['photos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $list[$i]['titre']?></h6>
                                                </div>
                                            </td>
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