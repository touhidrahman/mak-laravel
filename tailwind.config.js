const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: {
        content: [
            "**/*.html",
            "./app/**/*.php",
            "./resources/**/*.html",
            "./resources/**/*.js",
            "./resources/**/*.jsx",
            "./resources/**/*.ts",
            "./resources/**/*.tsx",
            "./resources/**/*.php",
            "./resources/**/*.vue",
            "./resources/**/*.twig",
        ],
        options: {
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
            safelist: {
                standard: ["xl:w-auto", "active"],
                deep: [/glide/],
            },
        },
    },
    darkMode: false,
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter var", ...defaultTheme.fontFamily.sans],
            },
            screens: {
                xs: "375px",
                ...defaultTheme.screens,
            },
            colors: {
                transparent: "transparent",
                white: "#ffffff",
                black: "#000000",
                "primary-lightest": "#fff8f0",
                "primary-lighter": "#ffe8d9",
                "primary-light": "#fb6d11",
                primary: "#f35627 ",
                "secondary-lighter": "#7e736f",
                "secondary-light": "#37241f",
                secondary: "#2d1b15",
                "grey-lighter": "#f9f9f9",
                "grey-light": "#f6f6f6",
                grey: "#f3f3f3 ",
                "grey-dark": "#ececec",
                "grey-darker": "#cac6c4",
                "grey-darkest": "#8c9ba5",
                v: {
                    // v for vibrant
                    red: "#ff0000 ",
                    "green-light": "#eef4e8",
                    green: "#31c643",
                    "blue-light": "#f4fdfd",
                    blue: "#27d4f3",
                    "blue-dark": "#32c2ea",
                    "purple-light": "#f5f3fc",
                    purple: "#3a15ce",
                    pink: "#fbf1f0 ",
                },
            },
            boxShadow: {
                xs: "0px 10px 20px -21px rgba(0, 0, 0, 0.2)",
                sm: "0 5px 16px rgba(11, 36, 62, 0.10)",
                DEFAULT: "0 2px 2px rgba(58, 14, 23, 0.15)",
                md: "0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)",
                lg: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
                outline: "0 0 0 3px rgb(251,109,17, 0.5)",
            },
            container: {
                center: true,
                padding: "1rem",
            },
            transitionDuration: {
                DEFAULT: "300ms",
            },
            spacing: {
                18: "4.5rem",
                68: "18rem",
                88: "22rem",
                100: "25rem",
                108: "27rem",
                120: "30rem",
                128: "32rem",
                204: "51rem",
            },
            width: {
                "3/10": "30%",
                "3/8": "37%",
                "5/11": "45%",
                "6/11": "55%",
                "13/14": "93%",
            },
            opacity: {
                85: "0.85",
            },
            fontSize: {
                "4.5xl": "2.80rem",
            },
            inset: {
                25: "25%",
                35: "35%",
                40: "40%",
                50: "50%",
                auto: "auto",
            },
            maxHeight: {
                0: "0",
                infinite: "999px",
            },
            zIndex: {
                "-1": "-1",
            },
            listStyleType: {
                latin: "lower-latin",
                circle: "circle",
                square: "square",
                roman: "upper-roman",
            },
            typography: (theme) => ({
                DEFAULT: {
                    css: {
                        color: theme("colors.secondary"),
                        "h1, h2, h3, h4, h5, h6": {
                            fontWeight: theme("fontWeight.normal"),
                            lineHeight: theme("lineHeight.tight"),
                            color: theme("colors.secondary"),
                        },
                        strong: {
                            fontWeight: theme("fontWeight.black"),
                        },
                        a: {
                            color: theme("colors.primary"),
                            textDecoration: "none",
                            fontWeight: theme("fontWeight.normal"),
                        },
                        "p, li": {
                            fontWeight: theme("fontWeight.normal"),
                            lineHeight: theme("lineHeight.relaxed"),
                        },
                        blockquote: {
                            borderColor: theme("colors.primary"),
                            backgroundColor: theme("colors.primary-lightest"),
                            fontStyle: theme("fontStyle.italic"),
                            fontWeight: theme("fontWeight.normal"),
                            fontSize: theme("fontSize.base"),
                            padding: `${theme("spacing.4")} ${theme(
                                "spacing.6"
                            )}`,
                            p: {
                                margin: 0,
                            },
                        },
                        table: {
                            borderWidth: "1px",
                            borderColor: theme("colors.grey-darker"),
                            tbody: {
                                th: {
                                    color: theme("colors.white"),
                                    backgroundColor: theme(
                                        "colors.secondary-lighter"
                                    ),
                                    padding: `${theme("spacing.2")} ${theme(
                                        "spacing.3"
                                    )}`,
                                },
                                td: {
                                    padding: `${theme("spacing.2")} ${theme(
                                        "spacing.3"
                                    )}`,
                                    "&:first-child": {
                                        padding: `${theme("spacing.2")} ${theme(
                                            "spacing.3"
                                        )}`,
                                    },
                                },
                            },
                        },
                    },
                },
            }),
        },
    },
    variants: {
        extend: {
            backgroundColor: ["active"],
            borderWidth: ["last"],
            borderColor: ["group-focus"],
            pointerEvents: ["group-hover"],
            display: ["group-hover", "last"],
            padding: ["hover"],
            zIndex: ["group-hover"],
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        require("@tailwindcss/aspect-ratio"),
    ],
};
