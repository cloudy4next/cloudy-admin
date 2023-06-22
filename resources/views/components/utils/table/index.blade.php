
<table {{ $attributes->merge(['class' => 'table table-sm table-bordered']) }}>
    <thead>
        {{ $heading }}
    </thead>

    <tbody >
        {{ $slot }}
    </tbody>
</table>
