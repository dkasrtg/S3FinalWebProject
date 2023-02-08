<div class="card"><link href="<?php bu('assets/admin/assets/css/main.css')?>" rel="stylesheet">
                        <div class="card-body">
                            <h4>Updating <?php echo $objet['titre']?></h4>
                            <p>More complex layouts can also be created with the grid system.</p>
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('front/object_updater')?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idobjet" value="<?php echo $objet['id']?>">    
                                <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="inputEmail4" placeholder="Titre" value="<?php echo set_value('titre'); ?>">
                                            <?php fe('titre')?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Prix estimatif</label>
                                            <input type="text" name="prix_estimatif" class="form-control" id="inputPassword4" placeholder="Prix estimatif" value="<?php echo set_value('prix_estimatif'); ?>">
                                            <?php fe('prix_estimatif')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Description</label>
                                        <textarea name="description" class="form-control" aria-label="With textarea"><?php echo set_value('description'); ?></textarea>
                                        <?php fe('description')?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">State</label>
                                            <select id="inputState" name="category" class="form-control">
                                                <?php 
                                                for ($i=0; $i <count($category) ; $i++) { 
                                                    ?>
                                                    <option value="<?php echo $category[$i]['id']?>" <?php if(set_value('first_name')==$category[$i]['id']){ echo "selected"; } ?>><?php echo $category[$i]['name']?></option>;
                                                    <?php
                                                }
                                                ?>
                                            </select
                                            ></div>
                                            <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>