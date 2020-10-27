@component('mail::layout')

    @slot('header')
        @component('mail::header',['url' => config('app.url')])
            {{asset('assets/images/logo.png')}}
        @endcomponent
    @endslot

    {{--body--}}
    <div>
        <h3>Dear,  <span>{{$user->name}}</span></h3>
        @if($user->status === 1))
        <h4 class="text-success text-center" style="font-family:  'Roboto', Helvetica, Arial, sans-serif;">
            <a>Congratulations</a></h4>
            <p class="text-center " style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 18px;">You're Account has been Successfully Approve by Administrator. Ready to get started? <a>Sign In</a> to your account & Start your Business.</p>
        <div>
            <div>
                <div style="font-family:arial,sans-serif;width:500px;margin:0px auto">
                    <div style="width:500px;margin:5px 0px 10px 0px;background-color:#ffffff;border-radius:3px;border-top:1px solid #ddd;box-shadow:0px 3px 5px #b2b2b2">
                        <div style="width:500px;vertical-align:top;text-align:center">
                            <a href="" target="_blank"></a>
                        </div>
                        <table style="width:500px;padding:20px">
                            <tbody>
                            <tr>
                                <td style="width:60%;text-align:left">
                                    <div style="font-size:16px;line-height:26px;color:#000000;font-weight:500">Your Account Email is: {{$user->email}} </div>
                                    <div style="margin-top:10px;font-size:14px;line-height:22px;color:#626262;word-wrap:break-word">{{$user->contact}}, {{$user->nicNumber}}</div>
                                </td>
                                <td style="vertical-align:bottom;text-align:right"><div style="float:right">
                                        <a href="" target="_blank" style="text-decoration:none">
                                            <span style="padding:13px 13px 12px 13px;border-radius:3px;font-size:17px;font-weight:normal;color:#ffffff;text-decoration:none;background-color:#35465b;display:block;text-align:center;line-height:22px;box-shadow:1px 3px 4px #b2b2b2;white-space:normal;">Sign In</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <h6 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';font-size: 16px;">Thank you</h6>
        </div>
            @else
            <p class="text-center " style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; font-size: 18px;">You're Account has been  <span style="color: red;">Rejected</span> by Administrator due to some reasons. For more information please <a href="mailto:administrator@example.com">Contact</a> to  web administrator.</p>
            <div>
                <div>
                    <div style="font-family:arial,sans-serif;width:500px;margin:0px auto">
                        <div style="width:500px;margin:5px 0px 10px 0px;background-color:#ffffff;border-radius:3px;border-top:1px solid #ddd;box-shadow:0px 3px 5px #b2b2b2">
                            <div style="width:500px;vertical-align:top;text-align:center">
                                <a href="" target="_blank"></a>
                            </div>
                            <table style="width:500px;padding:20px">
                                <tbody>
                                <tr>
                                    <td style="width:60%;text-align:left">
                                        <div style="font-size:16px;line-height:26px;color:#000000;font-weight:500">Your Account Email is:</div>
                                        <div style="margin-top:10px;font-size:14px;line-height:22px;color:#626262;word-wrap:break-word"> {{$user->email}}</div>
                                    </td>
                                    <td style="vertical-align:bottom;text-align:right"><div style="float:right">
                                            <a href=":mailto:administrator@example.com" target="_blank" style="text-decoration:none">
                                                <span style="padding:13px 13px 12px 13px;border-radius:3px;font-size:17px;font-weight:normal;color:#ffffff;text-decoration:none;background-color:#35465b;display:block;text-align:center;line-height:22px;box-shadow:1px 3px 4px #b2b2b2;white-space:normal;">Send Inquiry</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h6 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol';font-size: 16px;">Thank you</h6>
            </div>
        @endif
        {{--End Body--}}

        @slot('subcopy')
            @component('mail::subcopy')
                <p class="text-center">
                    This would like to receive emails.
                </p>
            @endcomponent
        @endslot

        @slot('footer')
            @component('mail::footer')
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('assets/images/logo.png')}}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h6>For queries & question Please Email us</h6>
                        <p><span class="fa-fa-envelope"></span> shop@online.com</p>
                        <p>copyright © 2020  {{config('app.name')}}</p>
                    </div>
                </div>
@endcomponent
@endslot
@endcomponent
