
<div class="card">
                        <div class="card-body">
                            <h4>Images de <?php echo $objet['titre']?></h4>
                            <?php 
                            for ($i=0; $i < count($objet['photos'])-1; $i++) { 
                                ?>
                                <div class="m-t-25">
                                <div class="card" style="max-width: 370px">
                                    <img class="card-img-top" src="<?php bu('assets/images/'.$objet['photos'][$i])?>" alt="">
                                    <div class="card-body">
                                        <h4 class="m-t-10"><?php echo $objet['photos'][$i]?></h4>
                                        <div class="m-t-20">
                                            <a href="<?php su('front/photo_delete?idobjet='.$objet['id'].'&photo='.$objet['photos'][$i])?>" class="btn btn-primary">Supprimer</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>Ajouter des photos</h4>
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('front/photo_insert')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                        <div class="checkbox">
                                        <input type="hidden" name="idobjet" value="<?php echo $objet['id']?>">
                                        <input type="file" name="files[]" class="custom-file-input" id="customFile" multiple>
        <label class="custom-file-label" for="customFile">Add photos</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    