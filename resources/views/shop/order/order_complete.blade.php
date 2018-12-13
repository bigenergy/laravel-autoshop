@extends('shop.main')
@section('content')

    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">Этап: 3/3</div>
        </div>
        <br>
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fab fa-wpforms"></i>
                Заказ завершен
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                Спасибо за покупку! Ваш заказ принят в обработку, мы вышлем Вам письмо на указанный вами адрес электронной почты.
            </div>
            <div class="card-footer">
                <div class="coupon col-md-12 col-sm-12 no-padding-left pull-left">

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('shop.main') }}" class="btn btn-outline-primary btn-block">В каталог</a>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#modalHelp">Мне не пришло письмо!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalHelp" tabindex="-1" role="dialog" aria-labelledby="modalHelpTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHelpTitle">Помощь по заказу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Не получили письмо на Email?<br>Указали неверный Email?<br>Другой вопрос?<br><br>Напишите в поддержку на наш Email - <b>support@autoshop.com</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
@endsection