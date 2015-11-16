# core-columns
Create a column group with the [column-group] shortcode, then add columns to the group with the [column] shortcode, like this:

    [column-group]
        [column]This is my first column[/column]
        [column]This is my second column[/column]
    [/column-group]

By default, each column will span 6 out of 12 columns. You can specifically define column span, like this:

    [column-group]
        [column span="3"]This is my first column spanned across 3 columns.[/column]
        [column span="9"]This is my second column spanned across 9 columns.[/column]
    [/column-group]
    
