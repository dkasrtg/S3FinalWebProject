<div class="page-header">
                        <h2 class="header-title">Mes propositions refusees</h2>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
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
                                            <th>Propose</th>
                                            <th>Objet souhaite</th>
                                            <th>Prix objet souhaite</th>
                                            <th>A echanger contre ma/mon/mes</th>
                                            <th>Date</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        for ($i=0; $i < count($data); $i++) { 
                                            ?>
                                                <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <input id="check-item-1" type="checkbox">
                                                    <label for="check-item-1" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                #<?php echo $data[$i]['idProposition']?>
                                            </td>
                                            <td>
                                                <?php echo $data[$i]['nomProposeur']." ".$data[$i]['prenomProposeur']?>
                                            </td>
                                            <td>
                                            <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$data[$i]['ObjetProposerPhotos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $data[$i]['ObjetProposerTitre']?></h6>
                                                </div>
                                            </td>
                                            <td>Ar <?php echo $data[$i]['ObjetProposerPrixEstimatif']?></td>
                                            <td>
                                                <!-- <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$data[$i]['ObjetProposerPhotos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $data[$i]['ObjetProposerTitre']?></h6>
                                                </div> -->
                                                <table>
                                                <?php 
                                                for ($j=0; $j < count($data[$i]['ObjetAproposer']); $j++) { 
                                                    ?>
                                                    <tr>
                                                        <td>
                                                        <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="<?php bu('assets/images/'.$data[$i]['ObjetAproposer'][$j]['photos'][0])?>" style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10"><?php echo $data[$i]['ObjetAproposer'][$j]['titre']?></h6>
                                                </div>
                                                        </td>
                                                        <td>
                                                            Ar <?php echo $data[$i]['ObjetAproposer'][$j]['prix_estimatif']?>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </table>
                                            </td>
                                            <td><?php echo $data[$i]['dateProposition']?></td>
                                            <td>
                                                            <a href="<?php su('Frontechange/delete/'.$data[$i]['idProposition'])?>"> Supprimer </a>
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