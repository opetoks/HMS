<div class="wallet-box-scroll"> 
    <div class="wallet-bradcrumb">
        <h2><i class="fas fa-wallet"></i> My Wallets</h2>
    </div>
    
    <div class="row">
        <?php 
            $staff = $db->prepare("SELECT * FROM staff ");
            $staff->execute();
            $totalstaff = $staff->rowCount();
                echo'
                <div class="card col-sm-4 mr-3 mt-2" style="color: #001c71;background-color: #627eea30;">
                <div class="card-body text-center">
                <div class="wallet-balance-ico">
                    <i class="fas fa-users" style="line-height: 46px;"></i>
                </div>
                <h4> Total Number of Staff </h4>
                    <h4>'.$totalstaff.'</h4>
                    <div class="my-wallet-address" data-toggle="modal" data-target="#view-wallet">
                    <div class="my-wallet-ico"><i class="fas fa-eye"></i><a href="?staff"> View wallet </a></div>
                    </div>
                </div>
                </div>
                ';
                                
        ?>
        <div class="card col-sm-3 mr-3 mt-2" style="cursor: pointer;color: #001c71;background-color: #627eea30; font-size: 18px;">
                <div class="card-body text-center" data-toggle="modal" data-target="#create-wallet">
                    <div class="my-wallet-ico" style="background-color: #001c71; border-radius: 100%; height: 45px;width: 45px;color:#fff;margin: 0px auto 15px;font-size: 22px;">
                        <i class="fas fa-plus" style="line-height: 46px;"></i>
                    </div>
                <h4>Manage Staff</h4>
                </div>                
        </div>
    
</div>