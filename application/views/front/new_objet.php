<div class="card">
                        <div class="card-body">
                            <h4>New Object</h4>
                            <p>More complex layouts can also be created with the grid system.</p>
                            <div class="m-t-25" style="max-width: 700px">
                                <form action="<?php su('front/object_insert')?>" method="post" enctype="multipart/form-data">
                                    <div class="form-row" >
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Titre</label>
                                            <input type="text" name="titre" class="form-control" id="inputEmail4" placeholder="Titre">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Prix estimatif</label>
                                            <input type="text" name="prix_estimatif" class="form-control" id="inputPassword4" placeholder="Prix estimatif">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Description</label>
                                        <textarea name="description" class="form-control" aria-label="With textarea"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputState">State</label>
                                            <select id="inputState" name="category" class="form-control">
                                                <?php 
                                                for ($i=0; $i <count($category) ; $i++) { 
                                                    ?>
                                                    <option value="<?php echo $category[$i]['id']?>"><?php echo $category[$i]['name']?></option>
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