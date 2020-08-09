    <!-- Modal Login -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">เข้าสู่ระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="loginform">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="user_username">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="user_username" id="user_username" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label for="user_password">รหัสผ่าน</label>
                                <input type="text" class="form-control" name="user_password" id="user_password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="genric-btn success">เข้าสู่ระบบ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Register -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">สมัครสมาชิก</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="regform">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="user_fristname">คำนำหน้า</label><br>
                                <select class="form-control" name="user_fristname" id="user_fristname">
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-lg">
                                <label for="user_name">ชื่อจริง</label>
                                <input type="text" class="form-control" name="user_name" id="user_name">
                            </div>
                            <div class="form-group col-12 col-lg">
                                <label for="user_lastname">นามสกุลจริง</label>
                                <input type="text" class="form-control" name="user_lastname" id="user_lastname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="user_nationality">สัญชาติ</label>
                                <input type="text" class="form-control" name="user_nationality" id="user_nationality">
                            </div>
                            <div class="form-group col-12 col-lg-8">
                                <label for="user_id">หมายเลขบัตรประชาชน</label>
                                <input type="text" class="form-control" name="user_id" id="user_id" onkeypress="return isNumberKey(event)" maxlength="13">
                            </div>
                        </div>
                        <p>การติดต่อ</p>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="address_housenumber">บ้านเลขที่</label>
                                <input type="text" class="form-control" name="address_housenumber"
                                    id="address_housenumber" onkeypress="return isNumberKey(event)" required>
                            </div>
                            <div class="form-group col-6 col-lg-4">
                                <label for="address_group">หมู่</label>
                                <input type="text" class="form-control" name="address_group" id="address_group" required>
                            </div>
                            <div class="form-group col-6 col-lg-4">
                                <label for="address_alleyroad">ซอย</label>
                                <input type="text" class="form-control" name="address_alleyroad" id="address_alleyroad">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="address_road">ถนน</label>
                                <input type="text" class="form-control" name="address_road" id="address_road">
                            </div>
                            <div class="form-group col-6 col-lg-4">
                                <label for="address_district">อำเภอ</label>
                                <input type="text" class="form-control" name="address_district" id="address_district" required>
                            </div>
                            <div class="form-group col-6 col-lg-4">
                                <label for="address_province">จังหวัด</label>
                                <input type="text" class="form-control" name="address_province" id="address_province" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-4">
                                <label for="address_zipcode">รหัสไปรษณี</label>
                                <input type="text" class="form-control" name="address_zipcode" id="address_zipcode" onkeypress="return isNumberKey(event)" maxlength="5">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-lg-6">
                                <label for="user_telephone">เบอร์โทรศัพท์</label>
                                <input type="text" class="form-control" name="user_telephone" id="user_telephone" onkeypress="return isNumberKey(event)" maxlength="10" required>
                            </div>
                            <div class="form-group col-6 col-lg-6">
                                <label for="user_lineID">ID LINE</label>
                                <input type="text" class="form-control" name="user_lineID" id="user_lineID">
                            </div>
                        </div>
                        <p>ผลประโชชน์</p>
                        <div class="form-row">
                            <div class="form-group col-6 col-lg-7">
                                <label for="user_beneficiary">ชื่อ-นามสกุล ผู้รับผลประโยชน์</label>
                                <input type="text" class="form-control" name="user_beneficiary" id="user_beneficiary">
                            </div>
                            <div class="form-group col-6 col-lg-5">
                                <label for="user_relationship">ความสัมพันธ์</label>
                                <input type="text" class="form-control" name="user_relationship" id="user_relationship">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-lg-7">
                                <label for="bank_com">บัญชีธนาคาร</label>
                                <input type="text" class="form-control" name="bank_com" id="bank_com">
                            </div>
                            <div class="form-group col-6 col-lg-5">
                                <label for="bacnk_branch">สาขา</label>
                                <input type="text" class="form-control" name="bacnk_branch" id="bacnk_branch">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6 col-lg-7">
                                <label for="bank_account">หมายเลขบัญชีธนาคาร</label>
                                <input type="text" class="form-control" name="bank_account" onkeypress="return isNumberKey(event)" id="bank_account">
                            </div>
                            <div class="form-group col-6 col-lg-5">
                                <label for="bacnk_type">ประเภทบัญชี</label><br>
                                <select name="bacnk_type" id="bacnk_type">
                                    <option value="ออมทรัพย์">ออมทรัพย์</option>
                                    <option value="ประจำ">ประจำ</option>
                                    <option value="กระแสรายวัน/เดินสะพัด">กระแสรายวัน/เดินสะพัด</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="bank_name">ชื่อบัญชี</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- <div class="form-group col-12 col-lg-7">
                                <label for="adviser_name">ผู้แนะนำ</label>
                                <input type="text" name="adviser_name" id="adviser_name" class="form-control" disabled>
                            </div> -->
                            <div class="form-group col-12 col-lg-12">
                                <label for="adviser_id">รหัสสมาชิกผู้แนะนำ <span id="warning"></span></label>
                                <input type="text" name="adviser_id" id="adviser_id" class="form-control" onkeypress="return isNumberKey(event)" required>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="genric-btn success" id="submitreg">สมัครสมาชิก</button>
                </div>
                </form>
            </div>
        </div>
    </div>