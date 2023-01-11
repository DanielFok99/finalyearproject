import 'package:flutter/material.dart';
import 'package:flutter/src/widgets/framework.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:mobile_scanner/mobile_scanner.dart';
import 'package:quantity_input/quantity_input.dart';

class InboundItemPage extends ConsumerWidget {
  MobileScannerController cameraController = MobileScannerController();
  final StateProvider<int> simpleIntInputProvider = StateProvider((_) => 0);

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    return Scaffold(
        appBar: AppBar(
          title: const Text('Item List'),
          actions: <Widget>[
            Padding(
                padding: const EdgeInsets.only(right: 20.0),
                child: GestureDetector(
                  onTap: () {
                    Navigator.pushNamed(context, '/scan');
                  },
                  child: const Icon(
                    Icons.document_scanner_outlined,
                    size: 26.0,
                  ),
                )),
            Padding(
                padding: const EdgeInsets.only(right: 20.0),
                child: GestureDetector(
                  onTap: () {
                    _showAlertDialog(context);
                  },
                  child: const Icon(
                    Icons.done,
                    size: 26.0,
                  ),
                )),
            // PopupMenuButton<String>(
            //   onSelected: handleClick,
            //   itemBuilder: (BuildContext context) {
            //     return {'Logout', 'Settings'}.map((String choice) {
            //       return PopupMenuItem<String>(
            //         value: choice,
            //         child: Text(choice),
            //       );
            //     }).toList();
            //   },
            // ),
          ],
        ),
        body: Column(
          children: [
            Expanded(
              child: ListView.builder(

                  itemCount: 50,
                  // padding: EdgeInsets.symmetric(vertical: 10),
                  itemBuilder: (BuildContext context, int index) {
                    int count = ref.watch(simpleIntInputProvider);



                    return ListTile(
                      leading: const Icon(Icons.list),
                      trailing: QuantityInput(
                          maxValue: 100000,
                          value: count,
                          onChanged: (value) {
                            ref.read(simpleIntInputProvider.notifier).state = int.parse(value.replaceAll(',', ''));
                            // setState(() =>
                            // simpleIntInput = int.parse(
                            //     value.replaceAll(',', '')));
                          }
                      ),
                      title: Text('List item $index'),
                    );
                  }),
            ),
            Row(
              children: [
                const Expanded(
                  child: TextField(
                    decoration: InputDecoration(
                      hintText: 'Enter barcode to search item',
                    ),
                  ),
                ),
                ElevatedButton(
                  child: Icon(Icons.search),
                  onPressed: () {
                    // button 2 press logic
                  },
                ),
              ],
            ),
          ],
        ));
  }

  void handleClick(String value) {
    switch (value) {
      case 'Logout':
        break;
      case 'Settings':
        break;
    }
  }

  // Widget itemAmountField(){
  //   return Row(
  //     children: [
  //
  //     ],
  //   );
  // }

  Future<void> _showAlertDialog(parentContext) async {
    return showDialog(
        context: parentContext,
        builder: (BuildContext context) {
          return AlertDialog(
            title: Text('Mark Job Done'),
            content: SingleChildScrollView(
              child: ListBody(
                children: [
                  Text('Are you sure the job is already complete?'),
                ],
              ),
            ),
            actions: [
              TextButton(
                child: const Text('No'),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              ),
              TextButton(
                child: const Text('Yes'),
                onPressed: () {
                  Navigator.of(context).pop();
                },
              ),
            ],
          );
        });
  }
}
