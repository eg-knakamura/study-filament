<x-filament::widget>
    <x-filament::card>
        <p style="color: #ff0099; font-size: 1.125rem; line-height: 1.75rem;">MstItemウィジェット表示</p>
        <table style="border-width: 2px; text-align: center">
            <tr>
                <th style="border-width: 2px; width: 150px">id</th><th style="border-width: 2px; width: 300px">商品名</th>
            </tr>
            @foreach($items as $item)
                <tr>
                    <td style="border-width: 2px; width: 150px">{{$item['id']}}</td><td style="border-width: 2px; width: 300px">{{$item['name']}}</td>
                </tr>
            @endforeach
        </table>
    </x-filament::card>
</x-filament::widget>
