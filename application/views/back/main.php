<div class="page-header">
                        <h2 class="header-title">Category list</h2>
</div>
<div class="card">
                        <div class="card-body">
                            <div class="m-t-25">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i=0; $i < count($catlist); $i++) { 
                                                ?>
                                            <tr>
                                                <th scope="row"><?php echo $catlist[$i]['id']?></th>
                                                <td style="text-transform:capitalize"><?php echo $catlist[$i]['name']?></td>
                                            </tr>
                                                <?php
                                            }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>