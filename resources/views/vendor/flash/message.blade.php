@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="fixed bottom-2 px-4 py-2 m-4 bg-gradient-to-r from-yellow-400 to-red-500 text-center flex justify-center text-white leading-none rounded-full flex lg:inline-flex sm:max-w-sm alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'bg-orange-100 bg-orange-500 border-l-4 text-orange-700 p-4' : '' }}"
                    role="alert"
        >
            @if ($message['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            <span class="text-center">{!! $message['message'] !!}</span>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
