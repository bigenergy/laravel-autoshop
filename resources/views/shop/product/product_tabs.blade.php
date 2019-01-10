<nav>
    <div class="nav nav-pills nav-fill" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="true">Описание</a>
        <a class="nav-item nav-link" id="nav-props-tab" data-toggle="tab" href="#nav-props" role="tab" aria-controls="nav-props" aria-selected="false">Характеристики</a>
        <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-feedback" aria-selected="false">Отзывы</a>
        <a class="nav-item nav-link" id="nav-topic-tab" data-toggle="tab" href="#nav-topic" role="tab" aria-controls="nav-topic" aria-selected="false">Обсуждение</a>

    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <br>
    <!-- ABOUT TAB -->

    <div class="tab-pane fade show active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
        <p class="card-text">{{ $product->description }}</p>
    </div>

    <!-- PROPS TAB -->

    <div class="tab-pane fade" id="nav-props" role="tabpanel" aria-labelledby="nav-props-tab">
        <table class="table table-borderless">
            <tbody>
            @foreach($product->props as $prop)
                <tr>
                    <td><b>{{ $prop->name }}</b></td>
                    <td>{{ $prop->pivot->value }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- FEEDBACK TAB -->

    <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
        in dev...
    </div>

    <!-- TOPIC TAB -->

    <div class="tab-pane fade" id="nav-topic" role="tabpanel" aria-labelledby="nav-topic-tab">
        in dev...
    </div>

</div>