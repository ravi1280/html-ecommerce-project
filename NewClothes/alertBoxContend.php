
<html>
<style>
    .box1 {
  width: 100vw;
  height: 100vh;
  background-color: rgba(0, 0, 0, 0.496);
  position: fixed;
  top: 0;
  left: 0;
  padding: 0;
  display: none;
}

.signoutBox {
  width: 30%;
  margin: 0;
  padding: 0;
  margin-left: 50%;
  transform: translateX(-50%);
  margin-top: 10vh;
  overflow: hidden;
}

.box-footer {
  display: flex;
  justify-content: end;
  width: 100%;
}

.box-footer button {
  width: 20%;
}

@media (max-width: 992px) {
  .signoutBox {
    width: 50%;
  }
}
</style>

<div class="box1 position-fixed" id="alertBox" style="z-index: 1000;">
    <div class="signoutBox rounded pb-1 bg-white">

        <div class="box-head alertBoxBackground">
            <label class="fw-bold p-3 ">Alert Box</label>
        </div>

        <!-- <div class="box-body mt-5 ">
            <label class="p-1" id="txtMessage">...</label>
        </div> -->
        <div class="modal-body p-5">
                        <div class="col-10 offset-1 rounded-3 alertBoxBackground p-4">
                            <div class="row d-flex justify-content-center align-items-center">
                                    <h4 class=" text-black text-center" id="txtMessage"></h4>
                            </div>

                        </div>
                    </div>

        <div class="box-footer gap-2 p-1 px-2">
            <button class="btn btn-secondary" id="alertCloseBtn">Done</button>
        </div>

    </div>
</div>
<!-- modal -->
<!-- <div class="modal" tabindex="-1" id="alertBox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black">Alert Box</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="col-10 offset-1 rounded-3 alertBoxBackground p-4">
                            <div class="row d-flex justify-content-center align-items-center">
                                    <h4 class=" text-black text-center" id="alertContend"></h4>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        modal -->

</html>
