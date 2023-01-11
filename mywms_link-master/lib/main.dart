import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:mywms_link/pages/HomePage.dart';
import 'package:mywms_link/pages/InboundItemPage.dart';
import 'package:mywms_link/pages/InboundJobListPage.dart';
import 'package:mywms_link/pages/LoginPage.dart';
import 'package:mywms_link/pages/ScanPage.dart';
import 'package:mywms_link/pages/SetHostPage.dart';
import 'package:mywms_link/pages/TestPage.dart';

import 'helpers/SharedHelper.dart';

// We create a "provider", which will store a value (here "Hello world").
// By using a provider, this allows us to mock/override the value exposed.
final helloWorldProvider = Provider((_) => 'HellFuture<void>rld');

Future<void> main() async {

  // Required for async calls in `main`
  WidgetsFlutterBinding.ensureInitialized();

  // Initialize SharedPrefs instance.
  await SharedHelper.init();

  runApp(
    // For widgets to be able to read providers, we need to wrap the entire
    // application in a "ProviderScope" widget.
    // This is where the state of our providers will be stored.


    const ProviderScope(
      child: MyApp(),
    ),
  );
}

// Extend ConsumerWidget instead of StatelessWidget, which is exposed by Riverpod
class MyApp extends ConsumerWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    final String value = ref.watch(helloWorldProvider);

    return MaterialApp(
      title: 'MyWMS Link',
      theme: ThemeData(
        primarySwatch: Colors.green,
      ),
      // initialRoute: '/inbound-item',
      initialRoute: '/login',
      routes: {
        '/': (context) => const HomePage(),
        '/setup-host': (context) => SetHostPage(),
        '/login': (context) => LoginPage(),
        '/inbound-job': (context) => InboundJobListPage(),
        '/inbound-item': (context) => InboundItemPage(),
        '/scan': (context) => ScanPage(),
        '/test': (context) => TestPage(),
      },
    );
  }
}
