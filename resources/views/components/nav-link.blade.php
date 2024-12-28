@props(['active' => false])

<a class="{{ $active ? 'text-white bg-gray-900' :  'text-white bg-inherit hover:text-green-400'}} w-fit py-1 lg:px-4 text-lg"
{{ $attributes }}
>{{ $slot }}</a>
