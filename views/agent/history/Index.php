<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<!-- <div class="page-heading">
    <h3>Total Saldo : Rp <?php echo number_format($balance)?></h3>
</div> -->
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            

            <div class="page-heading email-application">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Riwayat Transaksi</h3>
                    </div>
                </div>
            </div>
            <section class="section content-area-wrapper">
                <div class="content-right">
                    <div class="content-overlay"></div>
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <!-- email app overlay -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>No Transaksi</th>
                                            <th>No Tujuan</th>
                                            <th>Operator</th>
                                            <th>Detail</th>
                                            <th>Total</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Transaksi</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $json = json_encode($list_history_payment); 
                                        $json_decoded = json_decode($json); 
                                        foreach($json_decoded as $row){ ?>
                                        <tr>
                                            <td class="text-bold-500"><?php echo $row->trx_date;?></td>
                                            <td class="text-bold-500">#<?php echo $row->trx_id;?></td>
                                            <td class="text-bold-500">#<?php echo $row->trx_number;?></td>
                                            <td class="text-bold-500">#<?php echo $row->trx_op;?></td>
                                            <td class="text-bold-500">#<?php echo $row->trx_details;?></td>
                                            <td class="text-bold-500"><?php echo 'Rp '.($row->trx_total);?></td>
                                            <td class="text-bold-500"><?php echo $row->status_payment;?></td>
                                            <td class="text-bold-500"><?php echo $row->status_name;?></td>
                                            <td class="text-bold-500">
                                                <a href="<?php echo base_url('agent/transaction/detail/');?><?php echo $row->trx_id;?>" class="btn btn-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        </div>
        
    </section>
</div>

    