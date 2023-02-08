<div class="card">
                        <div class="card-body">
                        <h4>Updating <?php echo $objet['titre']?></h4>                            <p><?php echo $success?></p>
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('front/object_updater')?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idobjet" value="<?php echo $objet['id']?>">    
                                <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="titre">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="<?php echo $objet['titre']?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="prix_estimatif">Prix estimatif</label>
                                            <input type="text" name="prix_estimatif" class="form-control" id="prix_estimatif" placeholder="Prix estimatif" value="<?php echo $objet['prix_estimatif']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="description" class="form-control" aria-label="With textarea" ><?php echo $objet['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">State</label>
                                            <select id="inputState" name="category" class="form-control">
                                                <?php 
                                                for ($i=0; $i <count($category) ; $i++) { 
                                                    ?>
                                                    <option value="<?php echo $category[$i]['id']?>" <?php if($objet['idCategory']==$category[$i]['id']){ echo "selected"; } ?>><?php echo $category[$i]['name']?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                            <div class="form-group">
                                        
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>