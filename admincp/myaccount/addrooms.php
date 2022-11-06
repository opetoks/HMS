<div class="wallet-box-scroll">
    <div class="wallet-bradcrumb">
        <h2><i class="fas fa-bed"></i> ADD ROOMS</h2>
    </div>
    <div class="profile-page-area clearfix">
        <form name="addrooms" method="post" enctype="multipart/form-data">
        <div class="profile-page-area-main">

        <div class="profile-information-left">
                <div class="profile-information-box">

                <div class="theme-input-box">
                    <label>ROOM NUMBER</label>
                    <input id="room_id" name="room_id" placeholder="room ID" class="form-control input-md" required="" type="text">
                </div>
                <div class="theme-input-box">
                    <label for="exampleFormControlSelect2">ROOM AVAILABILITY</label>
                    <select multiple class="form-control" name="availability" id="room availability">
                        <option value="YES">YES</option>
                        <option value="NO"> NO </option>
                    </select>
                </div>
                <div class="theme-input-box">
                    <label>BOOKING PRICE</label>
                    <input id="" name="price" placeholder="8000" class="form-control input-md" required="" type="number">
                </div>
            </div>
        </div>

        <div class="profile-information-right">
            <div class="profile-information-box">
            
                <div class="theme-input-box">
                    <label for="roomDescription">ROOM DESCRIPTION</label>
                    <select multiple class="form-control" name="roomDescription" id="room availability">
                        <option value="SMALL">Small</option>
                        <option value="MEDIUM"> Medium </option>
                        <option value="LARGE"> Large </option>
                    </select>
                </div>
                
                <div class="theme-input-box">
                    <label for="roomCategory">ROOM CATEGORY</label>
                    <select multiple class="form-control" name="roomCategory" id="room availability">
                        <option value="Single Room">Single Room</option>
                        <option value="Twin Room"> Twin Room </option>
                        <option value="Double Room"> Double Room </option>
                        <option value="King Room"> King Room </option>
                    </select>
                </div>
                <div class="theme-input-box">
                    <img alt="ROOM PHOTO" id="pics" class="img-responsive" src="">
                    <input type="file" class="form-control input-md" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">   
                </div>
            
            <div class="profile-btn">
                <button class="theme-btn" type="submit" name="addRoombtn"> SAVE ROOM</button>
            </div>
            </div>
        </div>

        </div>
        </form>
        
    </div>
    </div>