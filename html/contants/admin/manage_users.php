<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none d-lg-block">ลำดับ</th>
                                    <th>รหัสสมาชิก</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>สถานะ</th>
                                    <th class="d-none d-lg-block">เบอร์โทรศัพท์</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sql = "SELECT user.*,dealer.geography_id,dealer.province_id,dealer.districts_id FROM `user` LEFT JOIN dealer ON user.user_id = dealer.user_id ORDER BY user.user_fristname ASC";
                                $result = $conn->query($sql);
                                $count = 0;
                                while ($rows = $result->fetch_array()) { ?>
                                    <tr>
                                        <td class="d-none d-lg-block"><?php echo ++$count; ?></td>
                                        <td><?php echo $rows['user_id']; ?></td>
                                        <td><?php echo $rows['user_fristname'] . $rows['user_name'] . ' ' . $rows['user_lastname']; ?></td>
                                        <td><?php echo ($rows['geography_id'] != NULL and $rows['province_id'] != NULL and $rows['districts_id'] != NULL) ? "<i class='fas fa-building nav-icon'></i> เป็นตัวแทนจำหน่วย" : "<i class='nav-icon fas fa-user-alt'></i> สมาชิกทั่วไป"; ?></td>
                                        <td class="d-none d-lg-block"><?php echo $rows['user_telephone']; ?></td>
                                        <td width="200px">
                                            <button class="btn btn-sm btn-success mr-1" title="ดูข้อมูลส่วนตัว"><i class="nav-icon fas fa-eye"></i></button>
                                            <button class="btn btn-sm btn-info mr-1" title="แก้ไขข้อมูล"><i class="nav-icon fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger mr-1" title="ระงับผู้ใช้งาน"><i class="nav-icon fas fa-ban"></i></button>
                                        </td>
                                    </tr>
                                <?php  }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="d-none d-lg-block">ลำดับ</th>
                                    <th>รหัสสมาชิก</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>สถานะ</th>
                                    <th class="d-none d-lg-block">เบอร์โทรศัพท์</th>
                                    <th>ตัวเลือก</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->