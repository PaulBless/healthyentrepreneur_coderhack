<!-- View -->
<div class="modal fade" id="food-menu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info" style="padding: 10px;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Food Menu List</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="">
                <input type="hidden" class="id" name="id" id="deptid">
                <div class="text-center">
                    <!-- <h3 class="bold unitname"></h3> -->
                    <table id="" class="table table-bordered table-hover">
                      <thead class="bg-dark text-white">
                        <th class="text-center">Food Item</th>
                        <th class="text-center">Quantity/Type</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Action</th>
                      </thead>
                      <tbody id="food-menu-tbody">
                      <tr>
                      <td>Banku and Tilapia with Hot Pepper</td>
                      <td>Bowl</td>
                      <td>Ghc 45.00</td>
                      <td><button class="btn btn-sm btn-primary">Order</button></td>
                      </tr>  
                      
                       <tr>
                      <td>Fufu and Light Soup (with Goat)</td>
                      <td>Bowl</td>
                      <td>Ghc 55.00</td>
                      <td><button class="btn btn-sm btn-primary">Order</button></td>
                      </tr>  

                      <tr>
                      <td>Fried Rice and Chicken</td>
                      <td>Plate</td>
                      <td>Ghc 35.00</td>
                      <td><button class="btn btn-sm btn-primary">Order</button></td>
                      </tr>  
                      
                       <tr>
                      <td>Plain Rice with Fried Fish</td>
                      <td>Plate</td>
                      <td>Ghc 25.00</td>
                      <td><button class="btn btn-sm btn-primary">Order</button></td>
                      </tr>
                        
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-right" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              </form>
            </div>
        </div>
    </div>
</div>