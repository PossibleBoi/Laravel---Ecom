<x-layout>
    <x-slot name="title_slot">
        Image Test
    </x-slot>
    <x-slot name="body_slot">
        <table>
            <th>Image</th>
            <tr>
                <td>
                    {{ $img->first()->image}}
                    {{$id}}
                </td>
            </tr>
        </table>
    </x-slot>
</x-layout>
