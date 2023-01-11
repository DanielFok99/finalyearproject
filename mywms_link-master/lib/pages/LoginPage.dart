import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:flutter_svg/flutter_svg.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:modal_progress_hud_nsn/modal_progress_hud_nsn.dart';
import 'package:mywms_link/components/rounded_btn.dart';
import 'package:mywms_link/helpers/DioHelper.dart';
import 'package:mywms_link/pages/HomePage.dart';

import '../helpers/SharedHelper.dart';
import '../helpers/AuthHelper.dart';

// Extend ConsumerWidget instead of StatelessWidget, which is exposed by Riverpod
class LoginPage extends ConsumerWidget {
  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final String value = ref.watch(helloWorldProvider);
    bool showSpinner = false;
    String email;
    String password;

    var emailController = TextEditingController(text: 'daniel@gmail.com');
    var passwordController = TextEditingController(text: 'password');

    final AuthProvider _authHelper = AuthProvider();


    return ModalProgressHUD(
      inAsyncCall: showSpinner,
      child: SafeArea(
        child: Scaffold(
          resizeToAvoidBottomInset: true,
          // backgroundColor: const Color(0xff251F34),
          body: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Center(
                  child: SizedBox(width: 175, height: 175, child: GestureDetector(
                    onLongPress: (){
                      Navigator.pushNamed(context, '/setup-host');
                    },
                      child: SvgPicture.asset('assets/images/login.svg'))),
                ),
                const Padding(
                  padding: EdgeInsets.fromLTRB(20, 15, 20, 8),
                  child: Text(
                    'Login',
                    style: TextStyle(
                        // color: Colors.white,
                        fontWeight: FontWeight.w600,
                        fontSize: 20),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 20.0),
                  child: Text(
                    'Please sign in to continue.',
                    style: TextStyle(color: Colors.grey[600], fontWeight: FontWeight.w400, fontSize: 13),
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 20.0),
                  child: Container(
                    margin: const EdgeInsets.symmetric(vertical: 10),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: <Widget>[
                        const Text(
                          'E-mail',
                          style: TextStyle(fontWeight: FontWeight.w300, fontSize: 13, color: Colors.black),
                        ),
                        const SizedBox(
                          height: 10,
                        ),
                        TextField(
                          controller: emailController,
                          style: (const TextStyle(color: Colors.white, fontWeight: FontWeight.w400)),
                          keyboardType: TextInputType.emailAddress,
                          cursorColor: Colors.white,
                          obscureText: false,
                          decoration: InputDecoration(
                            border: InputBorder.none,
                            fillColor: const Color(0xfff3B324E),
                            filled: true,
                            prefixIcon: Image.asset('assets/images/icon_email.png'),
                            focusedBorder: const OutlineInputBorder(
                              borderSide: BorderSide(color: Color.fromRGBO(0, 197, 105, 1), width: 2.0),
                              borderRadius: BorderRadius.all(Radius.circular(20.0)),
                            ),
                          ),
                          onChanged: (value) {
                            email = value;
                          },
                        ),
                      ],
                    ),
                  ),
                ),
                Container(
                  margin: const EdgeInsets.symmetric(vertical: 10, horizontal: 20),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: <Widget>[
                      const Text(
                        'Password',
                        style: TextStyle(fontWeight: FontWeight.w300, fontSize: 13, color: Colors.black),
                      ),
                      const SizedBox(
                        height: 10,
                      ),
                      TextField(
                        controller: passwordController,
                        style: (const TextStyle(color: Colors.white, fontWeight: FontWeight.w400)),
                        obscureText: true,
                        cursorColor: Colors.white,
                        decoration: InputDecoration(
                          border: InputBorder.none,
                          fillColor: const Color(0xfff3B324E),
                          filled: true,
                          prefixIcon: Image.asset('assets/images/icon_lock.png'),
                          focusedBorder: const OutlineInputBorder(
                            borderSide: BorderSide(color: Color.fromRGBO(0, 197, 105, 1), width: 2.0),
                            borderRadius: BorderRadius.all(Radius.circular(20.0)),
                          ),
                        ),
                        onChanged: (value) {
                          password = value;
                        },
                      ),
                    ],
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Center(
                    child: RoundedButton(
                        btnText: 'LOGIN',
                        color: const Color.fromRGBO(0, 197, 105, 1),
                        onPressed: () async {

                          if (await _authHelper.login(emailController.text, passwordController.text) ){

                            Navigator.pushAndRemoveUntil(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => const HomePage(),
                                ),
                                (route) => false);
                          }else{
                            Fluttertoast.showToast(msg: 'Login Failed',toastLength: Toast.LENGTH_SHORT);
                          }

                        }),
                  ),
                ),
                 Center(
                  child: TextButton(

                    onPressed: () {
                      final someString = SharedHelper.instance.getString('base_url') ?? 'defaultValue';
                      debugPrint(someString);
                    },
                    child: const Text(
                      'Forgot Password?',
                      style: TextStyle(color: Color.fromRGBO(0, 197, 105, 1)),
                    ),
                  ),
                ),
                const SizedBox(
                  height: 25,
                ),
                // Row(
                //   mainAxisAlignment: MainAxisAlignment.center,
                //   children: [
                //     Text('Dont have an account?',
                //       style: TextStyle(
                //           color: Colors.grey[600],
                //           fontWeight: FontWeight.w400
                //       ),),
                //     TextButton(
                //       onPressed: () {
                //
                //       },
                //       child: const Text('Sign up',
                //           style: TextStyle(
                //             color: Color(0xff14DAE2),)
                //       ),
                //     )
                //   ],
                // )
              ],
            ),
          ),
        ),
      ),
    );

    // return MaterialApp(
    //   home: Scaffold(
    //     appBar: AppBar(title: const Text('Example')),
    //     body: Center(
    //       child: Text(value),
    //     ),
    //   ),
    // );
  }
}

// We create a "provider", which will store a value (here "Hello world").
// By using a provider, this allows us to mock/override the value exposed.
final helloWorldProvider = Provider((_) => 'Hello world');
