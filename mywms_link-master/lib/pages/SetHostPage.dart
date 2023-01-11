import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:mobile_scanner/mobile_scanner.dart';
import 'package:shared_preferences/shared_preferences.dart';

class SetHostPage extends ConsumerWidget {
  MobileScannerController cameraController = MobileScannerController();
  DateTime? lastScan;
  SharedPreferences? _prefs;

  @override
  Widget build(BuildContext context, WidgetRef ref) {
    return Scaffold(
        appBar: AppBar(
          title: const Text('Set Up Host'),
          actions: [
            IconButton(
              color: Colors.white,
              icon: ValueListenableBuilder(
                valueListenable: cameraController.torchState,
                builder: (context, state, child) {
                  switch (state as TorchState) {
                    case TorchState.off:
                      return const Icon(Icons.flash_off, color: Colors.grey);
                    case TorchState.on:
                      return const Icon(Icons.flash_on, color: Colors.yellow);
                  }
                },
              ),
              iconSize: 32.0,
              onPressed: () => cameraController.toggleTorch(),
            ),
          ],
        ),
        body: MobileScanner(
            allowDuplicates: false,
            controller: cameraController,
            onDetect: (barcode, args) async {



              if (barcode.rawValue == null) {
                debugPrint('Failed to scan QRCode');
              } else {

                final currentScan = DateTime.now();
                if (lastScan == null || currentScan.difference(lastScan!) > const Duration(seconds: 1)) {
                  lastScan = currentScan;


                  if(barcode.url != null){
                    final String code = barcode.rawValue!;
                    _prefs = await SharedPreferences.getInstance();
                    _prefs?.setString("base_url", code);

                    Navigator.pop(context);
                    Fluttertoast.showToast(msg: 'Host found! $code', toastLength: Toast.LENGTH_LONG);
                    debugPrint(_prefs?.getString("base_url"));

                  }else{
                    Fluttertoast.showToast(msg: 'It is not a valid host', toastLength: Toast.LENGTH_LONG);

                  }


                }
              }
            }));
  }
}
