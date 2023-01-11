import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:mywms_link/pages/LoginPage.dart';

class HomePage extends ConsumerWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    void handleClick(String value) {
      switch (value) {
        case 'Logout':
          {
            Navigator.pushAndRemoveUntil(
                context,
                MaterialPageRoute(
                  builder: (context) => LoginPage(),
                ),
                (route) => false);
          }
          break;
        case 'Settings':
          break;
      }
    }

    return Scaffold(
        appBar: AppBar(
          title: const Text('My WMS'),
          actions: [
            PopupMenuButton<String>(
              onSelected: handleClick,
              itemBuilder: (BuildContext context) {
                return {'Logout', 'Settings'}.map((String choice) {
                  return PopupMenuItem<String>(
                    value: choice,
                    child: Text(choice),
                  );
                }).toList();
              },
            ),
          ],
        ),
        body: Center(
          child: Column(
            // crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              ElevatedButton(
                onPressed: () {
                  Navigator.pushNamed(context, '/inbound-job');
                },
                child: const Text('Inbound Receiving', style: TextStyle(fontSize: 16)),
              ),
              const SizedBox(
                height: 20,
              ),
              ElevatedButton(
                onPressed: () {
                  Fluttertoast.showToast(msg: 'Under Development', toastLength: Toast.LENGTH_SHORT);
                },
                child: const Text('Outbound Delivery', style: TextStyle(fontSize: 16)),
              ),
            ],
          ),
        ));
  }
}
