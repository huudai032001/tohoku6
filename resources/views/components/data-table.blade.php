@props([
    'tableHeadings',
    'tableRows'
])
<div class="table-responsive">
    <table {{ $attributes->merge([
            'class' => 'table table-striped'
            ]) }} >
        <thead>
            <tr class="bg-secondary text-white">
                {{ $tableHeadings }}
            </tr>
        </thead>
        <tbody>
            {{ $tableRows }}
        </tbody>
    </table>
</div>