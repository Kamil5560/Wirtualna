@extends('menu')

@section('title')
    <div class="row">
        <div class="col-8">
            <h3>Oceny</h3>
        </div>
    </div>
@endsection

@section('text')
    <div class="card-body">
        @csrf
        <div class="row mb-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="col-7">Przedmiot</th>
                    <th class="col-3">Ocena</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sc as $fesc)
                    <tr>
                    @if($fesc->groups_id == $group_id)
                            @foreach($subject as $fesubject)
                                @if($fesubject->id == $fesc->subject_id)
                                    <td>{{ $fesubject->name }}</td>
                                    <?php $subject_id = $fesubject->id; ?>
                                @endif
                            @endforeach
                                        <?php $flaga = false; ?>
                                    @foreach($sm as $fesm)
                                        @if($fesm->student_id == $student && $fesm->subject_id == $subject_id)
                                        <td>{{ $fesm->marks }}</td>
                                            <?php $flaga = true; ?>
                                            @endif
                                    @endforeach
                                @if($flaga == false)
                                    <td>brak</td>
                                @endif
                    @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
