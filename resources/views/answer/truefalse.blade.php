
@switch($rating)
        @case(1)
        <p class="text-red-800">◎正かい</p>
        コメント：<br>
        すばらしい！商を直す必要はありません！このまま筆算が進められるね！
        @break
        
    @case(2)
        <p class="text-red-800">〇正かい</p>
        コメント：<br>
        仮の商がしっかりと立てられていますね！あまりや不足を見てこの先も計算すれば筆算はばっちりです！
        @break
    
    @case(3)
        <p class="text-red-800">〇正かい</p>
        {{$intB}}を{{$answerB}}、{{$intA}}を{{$answerA}}とみると、{{$answerB}}÷{{$answerA}}と考えることができるね！
        基本はしっかりできています！答えと少しずれているから商を直すのは大変かもしれないので、およその計算よりも予想が正確になるといいね！
        @break

    @case(4)
        <p class="text-blue-800">×ざんねん</p>
        コメント：<br>
        {{$intB}}を{{$answerB}}、{{$intA}}を{{$answerA}}とみると、{{$answerB}}÷{{$answerA}}と考えることができるよ！
        {{$answerB}}÷{{$answerA}}は{{ $answerB / 10 }}÷{{ $answerA / 10 }}と答えが同じになるよ！
        @break
        
    @default

@endswitch