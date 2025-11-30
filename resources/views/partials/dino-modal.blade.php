<div class="modal fade" id="dinoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalDinoTitle">Tyrannosaurus Rex</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row">

                    <div class="col-md-6">
                        <img id="modalDinoImage"
                             src=""
                             class="img-fluid rounded h-100 w-100"
                             alt=""
                             style="object-fit: cover; object-position: center;">
                    </div>

                    <div class="col-md-6">
                        <p><strong>Тип:</strong> <span id="modalDinoType">Плотоядный</span></p>

                        <p id="modalDinoDescription"></p>
                        <p id="modalDinoDetails"></p>

                        <button type="button"
                                class="btn btn-info"
                                id="dinoFactPopover"
                                data-bs-toggle="popover"
                                data-bs-placement="top"
                                data-bs-content="Интересный факт о динозавре">
                            Интересный факт
                        </button>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" id="prevDino">
                    <i class="fas fa-chevron-left"></i> Назад
                </button>

                <button class="btn btn-secondary" id="nextDino">
                    Вперёд <i class="fas fa-chevron-right"></i>
                </button>
            </div>

        </div>
    </div>
</div>
