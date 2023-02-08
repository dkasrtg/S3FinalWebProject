<link href="<?php bu('assets/admin/assets/css/main.css')?>" rel="stylesheet">

<div class="card">
                        <div class="card-body">
                            <h4>New Object </h4>
                            <p><?php if(isset($_GET['success'])) { echo "(insert success)";}?></p>
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('front/object_insert')?>" method="post" enctype="multipart/form-data">
                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="titre">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="<?php echo set_value('titre')?>">
                                            <?php fe('titre')?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="prix_estimatif">Prix estimatif</label>
                                            <input type="text" name="prix_estimatif" class="form-control" id="prix_estimatif" placeholder="Prix estimatif"  value="<?php echo set_value('prix_estimatif')?>">
                                            <?php fe('prix_estimatif')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" aria-label="With textarea" id="description"><?php echo set_value('description')?></textarea>
                                        <?php fe('description')?>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">State</label>
                                            <select id="inputState" name="category" class="form-control">
                                                <?php 
                                                for ($i=0; $i <count($category) ; $i++) { 
                                                    ?>
                                                    <option value="<?php echo $category[$i]['id']?>"  <?php if(set_value('')==$category[$i]['id']){ echo "selected"; } ?>><?php echo $category[$i]['name']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select
                                            ></div>
                                            <div class="form-group">
                                        <div class="checkbox">
                                        <input type="file" name="files[]" class="custom-file-input" id="customFile" multiple>
        <label class="custom-file-label" for="customFile">Add photos</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>