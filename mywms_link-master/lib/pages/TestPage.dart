
import 'package:flutter/material.dart';
import 'package:flutter_riverpod/flutter_riverpod.dart';
import 'package:quantity_input/quantity_input.dart';

final StateProvider<int> simpleIntInputProvider = StateProvider((_) => 0);

class TestPage extends ConsumerWidget {
  // int simpleIntInput = 0;

  // By using a provider, this allows us to mock/override the value exposed.

  @override
  Widget build(BuildContext context,  WidgetRef ref) {
    int count = ref.watch(simpleIntInputProvider);

    return MaterialApp(
        title: 'Flutter Demo',
        theme: ThemeData(
          primarySwatch: Colors.blue,
        ),
        home: SafeArea(
            child: Scaffold(
                appBar: AppBar(
                    title: Text('Example')
                ),
                body: Center(
                    child: Column(
                        mainAxisSize: MainAxisSize.min,
                        children: [
                          QuantityInput(
                              label: 'Simple int input',
                              value: count,
                              onChanged: (value){

                                ref.read(simpleIntInputProvider.notifier).state = int.parse(value.replaceAll(',', ''));

                                // simpleIntInput = int.parse(value.replaceAll(',', ''));
                                // setState(() => simpleIntInput = int.parse(value.replaceAll(',', '')));
                              }
                          ),
                          Text(
                              'Value: $count',
                              style: const TextStyle(
                                  color: Colors.black,
                                  fontWeight: FontWeight.bold
                              )
                          ),
                        ]
                    )
                )
            )
        )
    );
  }
}
