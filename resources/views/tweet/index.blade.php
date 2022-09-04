<x-layout title="TOP|つぶやきアプリ">
  <x-layout.single>
    <h2 class="text-center text-blue-500 text-4xl fort-bold mt-8 mb-8">
      つぶやきアプリ
    </h2>
    <x-tweet.form.post></x-tweet.form.post>
    <x-tweet.list :tweets="$tweets"></x-tweet.list>
  </x-layout.single>
</x-layout>