<?php /** @var array $data */ ?>

@if (empty($data))
    <div class="alert alert-warning">
        {{ trans('good-log-viewer::errors.empty') }}
    </div>
@else
    <table id="log-table" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>{{ trans('good-log-viewer::general.date') }}</th>
            <th>{{ trans('good-log-viewer::general.level') }}</th>
            <th>{{ trans('good-log-viewer::general.context') }}</th>
            <th>{{ trans('good-log-viewer::general.text') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key => $item)
            <tr data-display="full_text_{{ $key }}">
                <td class="date">{{ $item['date'] }}</td>
                <td class="text">
                    <span class="label label-{{ $item['level_class'] }}">{{$item['level']}}</span>
                </td>
                <td class="text">{{ $item['context'] }}</td>
                <td class="text">
                    {{ $item['text'] }}

                    @if (!empty($item['file']))<br/>{{ $item['file'] }}@endif

                    @if ($item['full_text'])
                        <div class="full_text" id="full_text_{{ $key }}"
                             style="display: none; white-space: pre-wrap;">{{ trim($item['full_text']) }}
                        </div>
                    @endif
                </td>
                <td class="text">
                    @if ($item['full_text'])
                        <button type="button" class="btn btn-sm btn-default" data-display="full_text_{{ $key }}">
                            <span class="fa fa-eye"></span>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#log-table tr').on('click', function () {
                $('#' + $(this).data('display')).toggle();
            });

            $('#log-container').hide();
            $('#log-table').DataTable({
                "order": [0, 'desc'],
                "width": "100%",
                "bAutoWidth": false,
                "columns": [
                    {"width": "8em", target: 0},
                    {"width": "4em", target: 1},
                    {"width": "8em", target: 2},
                    {target: 3},
                    {"width": "2em", "orderable": false, target: 4}
                ],
                "drawCallback": function () {
                    $('#log-container').show();
                }
            });
        });
    </script>
@endif